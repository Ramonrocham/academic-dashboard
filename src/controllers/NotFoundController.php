<?php

namespace Ramon\Academic\controllers;

use Ramon\Academic\core\Controller;

class NotFoundController extends Controller{
    
    public function index(){
        http_response_code(404);
        $this->view('error/404');
    }        
}