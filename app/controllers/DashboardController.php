<?php
namespace formacom\controllers;
use formacom\core\Controller;
use formacom\models\Customer;
use formacom\models\Address;
use formacom\models\User;

class DashboardController extends Controller{
    public function index(...$params){
        
        $data = ['mensaje' => '¡Bienvenido al dashboard!'];
        $this->view('home', $data);
    }    public function profile(...$params){
        // Obtener información completa del usuario actual
        $userId = $_SESSION['user_id'] ?? null;
        
        if ($userId) {
            // Intentar múltiples formas de obtener el usuario
            $user = User::find($userId);
              // Consulta SQL directa para verificar
            try {
                $pdo = new \PDO('mysql:host=' . HOST . ';dbname=' . DB_DATABASE, DB_USER, DB_PASS);
                $stmt = $pdo->prepare("SELECT user_id, username, email, first_name, last_name, created_at, updated_at FROM user WHERE user_id = ?");
                $stmt->execute([$userId]);
                $rawData = $stmt->fetch(\PDO::FETCH_ASSOC);
                
                // Si los datos de Eloquent no tienen created_at pero la BD sí, usar los datos raw
                if ($rawData && isset($rawData['created_at']) && (!isset($user->created_at) || !$user->created_at)) {
                    // Crear un objeto estándar con los datos de la BD
                    $userObject = (object) $rawData;
                    $user = $userObject;
                }
            } catch (\Exception $e) {
                // Si falla la consulta directa, usar el usuario de Eloquent
            }
            
            $data = [
                'user' => $user,
                'success' => $_GET['success'] ?? null,
                'error' => $_GET['error'] ?? null
            ];
        } else {
            header("Location: " . base_url() . "auth/login");
            exit();
        }
        
        $this->view('profile', $data);
    }
    
    public function editProfile(...$params){
        $userId = $_SESSION['user_id'] ?? null;
        
        if (!$userId) {
            header("Location: " . base_url() . "auth/login");
            exit();
        }
        
        $user = User::find($userId);
        $data = ['user' => $user];
        
        // Si es POST, procesar la actualización
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $firstName = $_POST['first_name'] ?? '';
            $lastName = $_POST['last_name'] ?? '';
            $email = $_POST['email'] ?? '';
            $username = $_POST['username'] ?? '';
            
            // Validaciones básicas
            if (empty($firstName) || empty($lastName) || empty($email) || empty($username)) {
                $data['error'] = 'Todos los campos son obligatorios.';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $data['error'] = 'El email no tiene un formato válido.';
            } else {
                // Verificar si el email ya existe (excepto el del usuario actual)
                $existingUser = User::where('email', $email)->where('user_id', '!=', $userId)->first();
                if ($existingUser) {
                    $data['error'] = 'Este email ya está en uso por otro usuario.';
                } else {
                    // Verificar si el username ya existe (excepto el del usuario actual)
                    $existingUsername = User::where('username', $username)->where('user_id', '!=', $userId)->first();
                    if ($existingUsername) {
                        $data['error'] = 'Este nombre de usuario ya está en uso.';
                    } else {
                        // Actualizar los datos
                        $user->first_name = $firstName;
                        $user->last_name = $lastName;
                        $user->email = $email;
                        $user->username = $username;
                        
                        if ($user->save()) {
                            // Actualizar la sesión con el nuevo username
                            $_SESSION['username'] = $username;
                            
                            // Redirigir al perfil con mensaje de éxito
                            header("Location: " . base_url() . "dashboard/profile?success=Perfil actualizado correctamente");
                            exit();
                        } else {
                            $data['error'] = 'Error al actualizar el perfil. Inténtalo de nuevo.';
                        }
                    }
                }
            }
        }
        
        $this->view('edit-profile', $data);
    }
    
    public function changePassword(...$params){
        $userId = $_SESSION['user_id'] ?? null;
        
        if (!$userId) {
            header("Location: " . base_url() . "auth/login");
            exit();
        }
        
        $user = User::find($userId);
        $data = ['user' => $user];
        
        // Si es POST, procesar el cambio de contraseña
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $currentPassword = $_POST['current_password'] ?? '';
            $newPassword = $_POST['new_password'] ?? '';
            $confirmPassword = $_POST['confirm_password'] ?? '';
            
            // Validaciones
            if (empty($currentPassword) || empty($newPassword) || empty($confirmPassword)) {
                $data['error'] = 'Todos los campos son obligatorios.';
            } elseif (!password_verify($currentPassword, $user->password)) {
                $data['error'] = 'La contraseña actual es incorrecta.';
            } elseif (strlen($newPassword) < 6) {
                $data['error'] = 'La nueva contraseña debe tener al menos 6 caracteres.';
            } elseif ($newPassword !== $confirmPassword) {
                $data['error'] = 'Las contraseñas nuevas no coinciden.';
            } else {
                // Actualizar la contraseña
                $user->password = password_hash($newPassword, PASSWORD_DEFAULT);
                
                if ($user->save()) {
                    // Redirigir al perfil con mensaje de éxito
                    header("Location: " . base_url() . "dashboard/profile?success=Contraseña cambiada correctamente");
                    exit();
                } else {
                    $data['error'] = 'Error al cambiar la contraseña. Inténtalo de nuevo.';
                }
            }
        }
        
        $this->view('change-password', $data);
    }
   
}
?>
