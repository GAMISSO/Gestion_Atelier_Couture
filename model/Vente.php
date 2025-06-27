<?php

class Vente{
    private int $id=0;
    //jointure Client
    private string $client;

    private \DateTime $dateVente;

    //jointure Artivle Vente
    private string $articleVente;

    private int $qteVendue;

    private int $montantVente;

    private int $prixUnitaire;


    /**
     * Get the value of client
     */ 
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set the value of client
     *
     * @return  self
     */ 
    public function setClient($client)
    {
        $this->client = $client;

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
     * Get the value of qteVendue
     */ 
    public function getQteVendue()
    {
        return $this->qteVendue;
    }

    /**
     * Set the value of qteVendue
     *
     * @return  self
     */ 
    public function setQteVendue($qteVendue)
    {
        $this->qteVendue = $qteVendue;

        return $this;
    }

    /**
     * Get the value of montantVente
     */ 
    public function getMontantVente()
    {
        return $this->montantVente;
    }

    /**
     * Set the value of montantVente
     *
     * @return  self
     */ 
    public function setMontantVente($montantVente)
    {
        $this->montantVente = $montantVente;

        return $this;
    }

    /**
     * Get the value of prixUnitaire
     */ 
    public function getPrixUnitaire()
    {
        return $this->prixUnitaire;
    }

    /**
     * Set the value of prixUnitaire
     *
     * @return  self
     */ 
    public function setPrixUnitaire($prixUnitaire)
    {
        $this->prixUnitaire = $prixUnitaire;

        return $this;
    }

    public static function toVente($row):Vente{
        $vente=new Vente();
        $vente->setId($row['id']);
        $vente->setClient($row['client']);
        // $compte->setDateCreation($row['dateCreation']);
        $vente->setDateVente(new DateTime($row['dateVente']));
        $vente->setPrixUnitaire($row['prixUnitaire']);
        $vente->setArticleVente($row['articleVente']);
        $vente->setQteVendue($row['qteVendue']);
        $vente->setMontantVente($row['montantVente']);
        return $vente;

    }


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
     * Get the value of dateVente
     */ 
    public function getDateVente()
    {
        return $this->dateVente;
    }

    public function getDateVenteToString():string{
        return $this->dateVente->format("d/m/y");
    }

    /**
     * Set the value of dateVente
     *
     * @return  self
     */ 
    public function setDateVente($dateVente)
    {
        $this->dateVente = $dateVente;

        return $this;
    }
}