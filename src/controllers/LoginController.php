<?php

namespace Ramon\Academic\controllers;

use Ramon\Academic\core\Controller;

class LoginController extends Controller{

    public function index($msg = null){
        dd(dotenv('DB_USER'));
        $this->view('login/index', ['msg' => $msg]);
    }

    public function auth(){
        if(!isset($_POST['email']) || !isset($_POST['password'])){
            header('Location: /login');
            exit;
        }

        $password = $_POST['password'];
        $email = $_POST['email'];

        if($email === 'email@email.com' && $password === 'senha123'){
            
            session_start();
            $_SESSION['user'] = [
                'name' => 'Ramon',
                'email' => $email,
                'id' => 1
            ];
            $_SESSION['logged_in'] = true;
            $_SESSION['expires'] = time() + 60 * 60; // Expira em 1 hora
            
            header('Location: /dashboard');
            exit;
        }
        $this->index('Email ou senha incorretos');
        exit;
    }

    public function logout(){
        session_start();
        session_unset();
        session_destroy();
        header('Location: /login');
        exit;
    }
};