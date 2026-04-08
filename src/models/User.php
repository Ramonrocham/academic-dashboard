<?php

namespace Ramon\Academic\models;

use Ramon\Academic\core\Model;

class User extends Model{

    public function loginWithEmail($email, $password){
        $sql = "SELECT id, name, role, email from users WHERE email = :email and password_hash = :password";
        $params = [
            'email' => $email,
            'password' => $password
        ];
        return $this->database->fetch($sql, $params);
    }
}