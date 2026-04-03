<?php

namespace Ramon\Academic\controllers;

use Ramon\Academic\core\Controller;

class DashboardController extends Controller{
    
    public function index(){
        $this->view('dashboard/index');
    }

    public function class($idClass = null){
        $this->view('dashboard/class', ["idClass" => $idClass]);
    }
};