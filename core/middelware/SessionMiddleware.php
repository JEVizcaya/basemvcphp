<?php
namespace formacom\core\middelware;
class SessionMiddleware {
    protected $exemptControllers;

    /**
     * Constructor que recibe los controladores exentos.
     * @param array $exemptControllers
     */
    public function __construct($exemptControllers = []) {
        $this->exemptControllers = $exemptControllers;
    }    /**
     * Verifica la sesión o saltea la validación si el controlador está exento.
     * @param array $request Datos de la solicitud, que debe incluir 'controller'
     * @param callable $next Función a ejecutar en caso de validación exitosa
     */
    public function handle($request, $next) {
        // Siempre inicia la sesión si no está iniciada.
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Si el controlador actual está en la lista de exentos, no requiere autenticación.
        if (isset($request['controller']) && in_array($request['controller'], $this->exemptControllers)) {
            return $next($request);
        }

        // Comprueba la existencia de una variable de sesión (por ejemplo, 'user_id').
        if (!isset($_SESSION['user_id'])) {
            header("Location: ".base_url()."");
            exit();
        }

        return $next($request);
    }
}
?>
