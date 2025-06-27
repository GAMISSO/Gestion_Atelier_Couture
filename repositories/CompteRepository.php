<?php
require_once "./../config/Database.php";

class CompteRepository{
    private Database $database;
    public function __construct(){
        $this->database = new Database;
    }

    public function selectUserByLoginAndPassword(string $login,string $password):null|Compte{
        $sql="SELECT * FROM `compte` WHERE username='$login' and password='$password';";
        try {
            $stmt = $this->database->getPdo()->query($sql);
            if($row = $stmt->fetch()){
                return Compte::toUser($row );
            } 
        } catch (\PDOException $ex) {
            echo("Erreur ".$ex->getMessage());
            exit;
        }  
        return null;
    }

    public function selectAllUserByRole(string $role="Admin"):array{
        $sql="SELECT * FROM `compte` WHERE role='$role'";
        try {
            $stmt = $this->database->getPdo()->query($sql);
            $users=[];
            while($row = $stmt->fetch()){
                $users[]=Compte::toUser($row );
            } 
            return  $users;
        } catch (\PDOException $ex) {
            echo("Erreur ".$ex->getMessage());
            exit;
        }  
        return [];
    }

    public function selectAllUser():array{
        $sql="SELECT * FROM `compte` ;";
        try {
            $stmt = $this->database->getPdo()->query($sql);
            $users=[];
            while($row = $stmt->fetch()){
                $users[]=Compte::toUser($row );
            } 
            return  $users;
        } catch (\PDOException $ex) {
            echo("Erreur ".$ex->getMessage());
            exit;
        }  
        return [];
    }
}