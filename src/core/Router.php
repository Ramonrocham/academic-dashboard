<?php
namespace Ramon\Academic\core;

use Ramon\Academic\controllers\HttpErrorController;

class Router{

    public function dispatch($url){
        $url = trim($url, '/');

        $parts = $url ? explode('/', $url) : [];

        $controllerName = $parts[0] ?? 'Login';

        $controllerName = ucfirst($controllerName) . "Controller";

        $controllerClass = "\\Ramon\\Academic\\controllers\\" . $controllerName;

        $actionName = $parts[1] ?? 'index';

        if(!class_exists($controllerClass)){
            $controller = new HttpErrorController;
            $controller->notFound();
            return;
        }

        $controller = new $controllerClass();
        
        if(!method_exists($controller, $actionName)){
            $controller = new HttpErrorController;
            $controller->notFound();
            return;
        }
        $params = array_slice($parts, 2);

        call_user_func_array([$controller, $actionName], $params);
    }
}