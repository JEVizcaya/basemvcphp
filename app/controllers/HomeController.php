<?php
namespace formacom\controllers;
use formacom\core\Controller;
class HomeController extends Controller{
    public function index(...$params){
        $this->view("home");
    }
     
}