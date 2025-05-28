<?php
require_once("./config/database.php");
require_once("./core/helpers.php");
use formacom\core\App;
use formacom\core\middelware\SessionMiddleware;
$app=new App();

// Agregamos el middleware de sesión, especificando que controladores no requieren sesión.
// Por ejemplo, si tienes un LoginController y RegisterController, los exentas:
$app->addMiddleware(new SessionMiddleware([
    'formacom\controllers\AuthController',
    'formacom\controllers\HomeController'
]));

$app->run();
?>