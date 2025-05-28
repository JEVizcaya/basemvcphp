<?php
namespace formacom\controllers;
use formacom\core\Controller;
use formacom\models\Customer;
use formacom\models\Address;

class DashboardController extends Controller{
    public function index(...$params){
        
        $data = ['mensaje' => '¡Bienvenido al dashboard!'];
        $this->view('home', $data);
    }
   
}
?>
