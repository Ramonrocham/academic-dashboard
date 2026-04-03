<?

namespace Ramon\Academic\core;

class Router{

    public function dispatch($url){
        $url = trim($url, '/');

        $parts = $url ? explode('/', $url) : [];

        $controllerName = $parts[0] ?? 'Login';
        $controllerName = ucfirst($controllerName) . "Controller";
        print_r($parts);
        echo '<hr>';
        echo "controler: $controllerName";
        
    }
}