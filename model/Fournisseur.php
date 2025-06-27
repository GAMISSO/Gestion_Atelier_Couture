<?php

require_once "Personne.php";

class Fournisseur extends Personne{

    private String $telFixe;
    

    /**
     * Get the value of telFixe
     */ 
    public function getTelFixe()
    {
        return $this->telFixe;
    }

    /**
     * Set the value of telFixe
     *
     * @return  self
     */ 
    public function setTelFixe($telFixe)
    {
        $this->telFixe = $telFixe;

        return $this;
    }

    public static function toFournisseur($row):Fournisseur{
        $fournisseur=new Fournisseur();
        $fournisseur->setId($row['id']);
        $fournisseur->setNom($row['nom']);
        // $compte->setDateCreation($row['dateCreation']);
        $fournisseur->setPrenom($row['prenom']);
        $fournisseur->setAdresse($row['adresse']);
        $fournisseur->setTelephone($row['tel']);
        $fournisseur->setTelFixe($row['telFixe']);
        // $fournisseur->setPhoto($row['photo']);
        return $fournisseur;

    }

}