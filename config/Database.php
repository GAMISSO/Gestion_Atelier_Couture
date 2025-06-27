<?php

class Database{
    private \PDO|null $pdo=null;
    public function __construct(){

        try{

            $host = 'localhost:3306';
            $dbname = 'gestionAtelierCouture';
            $username = 'root';
            $password = '';
            $charset = 'utf8mb4'; 
            $dsn="mysql:host=$host;dbname=$dbname;charset=$charset";
            //ouvrir la connexion
            if ($this->pdo==null) {
                # code...
                $this->pdo = new PDO($dsn, $username, $password,[
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    
                ]);
            }
        }
        catch(\PDOException $e){
            echo $e->getMessage();
            exit;
        }
    }

    /**
     * Get the value of pdo
     */ 
    public function getPdo()
    {
        return $this->pdo;
    }
}