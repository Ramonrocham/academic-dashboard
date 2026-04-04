<?php

namespace Ramon\Academic\controllers;

use Ramon\Academic\core\Controller;

class HttpErrorController extends Controller{
    
    public function notFound(){
        http_response_code(404);
        $this->view('error/404');
    }        

    public function internalServerError(){
        http_response_code(500);
        $this->view('error/500');
    }

    public function notAuth(){
        http_response_code(403);
        $this->view('error/403');
    }
}