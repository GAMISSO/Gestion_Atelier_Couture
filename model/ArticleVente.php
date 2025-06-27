<?php

class ArticleVente extends Article{
    private int $prixVente;

    private int $montVente;

    /**
     * Get the value of id
     */ 


    /**
     * Get the value of prixVente
     */ 
    public function getPrixVente()
    {
        return $this->prixVente;
    }

    /**
     * Set the value of prixVente
     *
     * @return  self
     */ 
    public function setPrixVente($prixVente)
    {
        $this->prixVente = $prixVente;

        return $this;
    }

    /**
     * Get the value of montVente
     */ 
    public function getMontVente()
    {
        return $this->montVente;
    }

    /**
     * Set the value of montVente
     *
     * @return  self
     */ 
    public function setMontVente($montVente)
    {
        $this->montVente = $montVente;

        return $this;
    }

    public static function toArticleVente($row):ArticleVente{
        $articleVente=new ArticleVente();
        $articleVente->setId($row['id']);
        $articleVente->setLibelle($row['libelle']);
        $articleVente->setPrixVente($row['prixVente']);
        $articleVente->setQteStock($row['qteStock']);
        $articleVente->setMontVente($row['montStock']);
        $articleVente->setCategorie($row['categorie']);
        return $articleVente;

    }


}