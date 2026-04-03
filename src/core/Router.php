<?php
namespace Ramon\Academic\core;

class Router{

    public function dispatch($url){
        $url = trim($url, '/');

        $parts = $url ? explode('/', $url) : [];

        $controllerName = $parts[0] ?? 'Login';

        $controllerName = ucfirst($controllerName) . "Controller";

        $controllerClass = "\\Ramon\\Academic\\controllers\\" . $controllerName;

        $actionName = $parts[1] ?? 'index';

        if(!class_exists($controllerClass)){
            $controllerClass = "\Ramon\\Academic\\controllers\\NotFoundController";
        }
        $controller = new $controllerClass();
        
        if(!method_exists($controller, $actionName)){
            $actionName = 'index';
        }
        $controller->$actionName();
    }
}