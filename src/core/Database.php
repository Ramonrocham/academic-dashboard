<?php

namespace Ramon\Academic\core;

class Database{ 

    private static $instance = null;

    private $connection = null;

    private function __construct(){
        // Impede a criação de instâncias diretamente
    }

    public static function getInstance(){
        if(self::$instance === null){
            self::$instance = new Database();
        }
        return self::$instance;
    }

    private function connect(){
        $host = dotenv('DB_HOST');
        $dbname = dotenv('DB_NAME');
        $username = dotenv('DB_USER');
        $password = dotenv('DB_PASSWORD');
        $driver = dotenv('DB_DRIVER');
        $port = dotenv('DB_PORT');

        $dsn = "$driver:host=db;port=$port;dbname=$dbname;";

        $options = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
        ];
        try{
            $this->connection = new \PDO($dsn, $username, $password, $options);
        }catch(\PDOException $e){
            dd($e->getMessage());
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function query($sql, $params = []){
        if($this->connection === null){
            $this->connect();
        }
        
        try{
            $stmt = $this->connection->prepare($sql);
            $stmt->execute($params);
            return $stmt;
        }catch(\PDOException $e){
            dd($e->getMessage());
            throw new \PDOException('Erro de consulta: ' . $e->getMessage(), (int)$e->getCode());
        }
    }
}