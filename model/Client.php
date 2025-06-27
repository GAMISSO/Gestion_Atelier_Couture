<?php
require_once "Personne.php";
class Client extends Personne{
    private String $observation;
    private  array $ventes=[];
    
    public function __construct() {
        parent::__construct();
    }
    

    /**
     * Get the value of observation
     */ 
    public function getObservation()
    {
        return $this->observation;
    }

    /**
     * Set the value of observation
     *
     * @return  self
     */ 
    public function setObservation($observation)
    {
        $this->observation = $observation;

        return $this;
    }


    public static function toClient($row):Client{
        $client=new Client();
        $client->setId($row['id']);
        $client->setNom($row['nom']);
        // $compte->setDateCreation($row['dateCreation']);
        $client->setPrenom($row['prenom']);
        $client->setAdresse($row['adresse']);
        $client->setTelephone($row['telephone']);
        $client->setObservation($row['observation']);
        $client->setPhoto($row['photo']);
        return $client;
    }

    /**
     * Get the value of ventes
     */ 
    public function getVentes()
    {
        return $this->ventes;
    }

    /**
     * Set the value of ventes
     *
     * @return  self
     */ 
    public function addVente(Vente $vente): void
    {
        $this->ventes[] = $vente;
    }
}