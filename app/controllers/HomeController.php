<?php
namespace formacom\controllers;
use formacom\core\Controller;

class HomeController extends Controller{
    public function index(...$params){
        $this->view("home");
    }
    
    public function about(...$params){
        $this->view("about");
    }
    
    public function services(...$params){
        $this->view("services");
    }
      public function contact(...$params){
        $data = [];
        
        // Si es POST, procesar el formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $phone = $_POST['phone'] ?? '';
            $service = $_POST['service'] ?? '';
            $budget = $_POST['budget'] ?? '';
            $message = $_POST['message'] ?? '';
            
            // Validaciones básicas
            if (empty($name) || empty($email) || empty($message)) {
                $data['error'] = 'Por favor completa todos los campos obligatorios.';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $data['error'] = 'Por favor ingresa un email válido.';
            } else {
                // Aquí podrías enviar el email, guardar en BD, etc.
                // Por ahora solo mostramos un mensaje de éxito
                $data['success'] = 'Gracias por tu mensaje, ' . htmlspecialchars($name) . '. Te contactaremos pronto.';
                
                // Log del mensaje (opcional)
                error_log("Nuevo mensaje de contacto de: $name ($email) - Servicio: $service");
            }
        }
        
        $this->view("contact", $data);
    }
}