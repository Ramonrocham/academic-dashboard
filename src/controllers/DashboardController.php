<?php

namespace Ramon\Academic\controllers;

use Ramon\Academic\core\Controller;
// 2. Limpa todas as variáveis da sessão (esvazia a "gaveta")

session_start();
class DashboardController extends Controller{
    
    public function index(){
        if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true || !isset($_SESSION['expires']) || time() > $_SESSION['expires']){
            header('Location: /login');
            exit;
        }

        $this->view('dashboard/index', $_SESSION['user']);
    }

    public function class($idClass = null){
        $this->view('dashboard/class', ["idClass" => $idClass]);
    }
};