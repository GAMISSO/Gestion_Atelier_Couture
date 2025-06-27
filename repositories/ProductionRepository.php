<?php
require_once "./../config/Database.php";
require_once "./../model/Production.php";
class ProductionRepository{
    private Database $database;

    public function __construct()
    {
        $this->database = new Database;
    }

    public function selectAllProduction():array{
        $sql="SELECT * FROM `production`";
        try {
            //2-Executer la Requete
            //3-Recuperer les donnees sous forme de tableau
                $stmt = $this->database->getPdo()->query($sql);
                $productions=[];
                while ($row = $stmt->fetch()) {
                    $productions[]=Production::toProduction($row);
                }
                return $productions;
        } catch (\PDOException $ex) {
            echo("Erreur ".$ex->getMessage());
            exit;
        }  
        return [];
    }

    public function selectProductionById(String $id):Production|null{
        $sql="select * from production where id='$id'";
        try {
            $stmt = $this->database->getPdo()->query($sql);
            if($row = $stmt->fetch()){
                return Production::toProduction($row);
            }
        } catch (\PDOException $ex) {
            echo("Erreur ".$ex->getMessage());
            exit;
        }  
        return null;
    }

    public function insertProduction(Production $production):int{
        $sql= "INSERT INTO `production` (`id`, `observation`, `articleVente`, `qteProduit`) VALUES ('".$production->getId()."', '".$production->getObservation()."', '".$production->getArticleVente()."', '".$production->getQteProduit()."');";
        $nbreProductionInsere =0;
        try {
            $nbreProductionInsere = $this->database->getPdo()->exec($sql); 
        } catch (\PDOException $ex) {
            echo("Erreur ".$ex->getMessage());
            exit;
        }  

        return  $nbreProductionInsere;
    }

    //pas fini
    public function updateProduction(Production $production):int{
        $sql="UPDATE `production` SET `telephone` = '77 333 65 74' WHERE `production`.`id` = '".$production->getId()."';";
        $nbreProductionUpdate=0;
        try{
            $nbreProductionUpdate=$this->database->getPdo()->exec($sql);
        } catch (\PDOException $ex) {
            echo("Erreur".$ex->getMessage());
            exit;
        }
        return $nbreProductionUpdate;
    }

    public function count():int{
        $sql="SELECT count(id) as count FROM `production`";
        try {
            $stmt = $this->database->getPdo()->query($sql);
            if($row = $stmt->fetch()){
            return $row["count"];
            }
        } catch (\PDOException $ex) {
                echo("Erreur ".$ex->getMessage());
                exit;
        }  
        return 0;
    }


    public function selectLastInsertId():int{
        $sql="SELECT id FROM `production` ORDER by `id` desc LIMIT 0,1";
        try {
            $stmt = $this->database->getPdo()->query($sql);
            if($row = $stmt->fetch()){
            return $row["id"];
            }       
        } catch (\PDOException $ex) {
                echo("Erreur ".$ex->getMessage());
                exit;
        }  
        return 0;
    }
}