<?php

class Production{
    private int $id=0;
    private string $observation;
    private string $articleVente;
    private int $qteProduit;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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

    /**
     * Get the value of articleVente
     */ 
    public function getArticleVente()
    {
        return $this->articleVente;
    }

    /**
     * Set the value of articleVente
     *
     * @return  self
     */ 
    public function setArticleVente($articleVente)
    {
        $this->articleVente = $articleVente;

        return $this;
    }

    /**
     * Get the value of qteProduit
     */ 
    public function getQteProduit()
    {
        return $this->qteProduit;
    }

    /**
     * Set the value of qteProduit
     *
     * @return  self
     */ 
    public function setQteProduit($qteProduit)
    {
        $this->qteProduit = $qteProduit;

        return $this;
    }

    public static function toProduction($row):Production{
        $production=new Production();
        $production->setId($row['id']);
        $production->setObservation($row['observation']);
        // $compte->setDateCreation($row['dateCreation']);
        $production->setArticleVente($row['articleVente']);
        $production->setQteProduit($row['qteProduit']);
        return $production;
    }


}