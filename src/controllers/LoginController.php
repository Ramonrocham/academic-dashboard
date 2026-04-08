<?php

namespace Ramon\Academic\controllers;

use Ramon\Academic\core\Controller;
use Ramon\Academic\models\User;

class LoginController extends Controller{

    public function index($msg = null){
        $this->view('login/index', ['msg' => $msg]);
    }

    public function auth(){
        if(!isset($_POST['email']) || !isset($_POST['password'])){
            header('Location: /login');
            exit;
        }

        $password = $_POST['password'];
        $email = $_POST['email'];
        $user = new User();

        $result = $user->loginWithEmail($email, $password);

        if($result && isset($result['id'])){
            session_start();
            $_SESSION['user'] = [
                'name' => $result['name'],
                'email' => $result['email'],
                'id' => $result['id'],
                'role' => $result['role']
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