<?php

namespace Ramon\Academic\core;

class Database{ 

    public function connect(){
        $host = $_ENV['DB_HOST'];
        $dbname = $_ENV['DB_DB'];
        $username = $_ENV['DB_USER'];
        $password = $_ENV['DB_PASSWORD'];
    }
}