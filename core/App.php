<?php
namespace formacom\Core;
class App{
    protected $controller="formacom\\controllers\\HomeController";
    protected $method="index";
    protected $params=[];
    protected $middlewares = [];

    public function __construct(){
        $url=$this->parseUrl();
       
         // Verificar el controlador
         if(file_exists('./app/controllers/' . ucfirst($url[0]) . 'Controller.php')) {
            $this->controller = "formacom\\controllers\\".ucfirst($url[0]) . 'Controller';
            unset($url[0]);
        } else {
            //redireccionar a base_url

            header("Location: ".base_url());
        }
        $this->controller = new $this->controller;         // Verificar el método
         if(isset($url[1])) {
            // Convertir kebab-case a camelCase para nombres de métodos
            $methodName = $this->convertToCamelCase($url[1]);
            if(method_exists($this->controller, $methodName)) {
                $this->method = $methodName;
                unset($url[1]);
            }
        }
           // Parámetros
           $this->params = $url ? array_values($url) : [];
           //Lo ejecutamos despues del midelware
           //call_user_func_array([$this->controller, $this->method], $this->params);
    }
     /**
     * Permite agregar middlewares a la aplicación.
     * @param object $middleware
     */
    public function addMiddleware($middleware) {
        $this->middlewares[] = $middleware;
    }
/**
     * Ejecuta la aplicación: se añade el nombre del controlador al request y se aplican los middlewares.
     */
    public function run() {
        // Preparamos un request simulando un array (puedes usar un objeto Request si lo prefieres)
        $request = $_SERVER;
        // Agregamos el nombre del controlador para que el middleware lo conozca
        $request['controller'] = get_class($this->controller);

        $this->applyMiddlewares($request, function($request) {
            call_user_func_array([$this->controller, $this->method], $this->params);
        });
    }
    /**
     * Aplica recursivamente los middlewares.
     * @param array $request
     * @param callable $next
     * @param int $index
     */
    protected function applyMiddlewares($request, $next, $index = 0) {
        if (isset($this->middlewares[$index])) {
            $middleware = $this->middlewares[$index];
            $middleware->handle($request, function($request) use ($next, $index) {
                $this->applyMiddlewares($request, $next, $index + 1);
            });
        } else {
            $next($request);
        }    }
    
    /**
     * Convierte kebab-case a camelCase
     * edit-profile -> editProfile
     */
    private function convertToCamelCase($string) {
        return lcfirst(str_replace('-', '', ucwords($string, '-')));
    }
    
    private function parseUrl() {
        if(isset($_GET['url'])) {
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
        return ['home','index'];
    }
}
?>