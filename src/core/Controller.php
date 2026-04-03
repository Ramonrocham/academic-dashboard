<?php

namespace Ramon\Academic\core;

use Exception;

class Controller{
    protected function view($view){
        $viewFile = __DIR__ . "/../views/$view.php";
        if(!file_exists($viewFile)){
            throw new Exception("View file not found: " . $viewFile);
        }
        require_once $viewFile;
    }
}