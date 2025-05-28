<?php
namespace formacom\controllers;
use formacom\core\Controller;
use formacom\models\User;


class AuthController extends Controller{
    public function index(...$params){
        
        $this->view("login");
    }
    public function login(...$params){
        if(isset($_POST["username"])){
            $user=User::where("username",$_POST["username"])->first();
            if($user && password_verify($_POST["password"],$user->password)){
                session_start();
                $_SESSION["user_id"]=$user->user_id;
                $_SESSION["username"]=$user->username;
                header("Location: ".base_url()."dashboard");

            }else{
                $error="User or pass incorrect";
                $this->view("login",[$error]);
            }
            //var_dump($user->password);
            
            exit();
        }else{
           header("Location: ".base_url()."auth");
        }
       
    }

    public function register(...$params){
        if(isset($_POST["username"])){
            $user=User::where("username",$_POST["username"])->first();
            if($user){
                $error="Username already exists";
                $this->view("register",[$error]);
            }else{}
        
            $user=new User();
            $user->username=$_POST["username"];
            $user->email=$_POST["email"];
            $user->first_name=$_POST["first_name"];
            $user->last_name=$_POST["last_name"];;
            $user->password=password_hash($_POST["password"],PASSWORD_DEFAULT);
            
            $user->save();
            header("Location: ".base_url()."auth");
            exit();
        }
        $this->view("register");
    }

    public function logout(...$params){
        session_start();
        session_destroy();
        header("Location: ".base_url());
        exit();
    }

}
?>