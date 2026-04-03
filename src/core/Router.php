<?php
namespace Ramon\Academic\core;

class Router{

    public function dispatch($url){
        $url = trim($url, '/');

        $parts = $url ? explode('/', $url) : [];

        $controllerName = $parts[0] ?? 'Login';
        $controllerName = ucfirst($controllerName) . "Controller";

        $controllerClass = "\\Ramon\\Academic\\controllers\\" . $controllerName;

        if(!class_exists($controllerClass)){
            echo "ERROR 404: PAGE NOT FOUND";
            return;
        }
        $controller = new $controllerClass();

        $controller->index();
    }
}