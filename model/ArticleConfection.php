<?php
require_once "./../model/Article.php";
class ArticleConfection extends Article {
    private int $prixAchat;
    private int $qteAchat;
    private int $montStock;

    /**
     * Get the value of id
     */ 

    /**
     * Set the value of id

     */ 


    /**
     * Get the value of prixAchat
     */ 
    public function getPrixAchat()
    {
        return $this->prixAchat;
    }

    /**
     * Set the value of prixAchat
     *
     * @return  self
     */ 
    public function setPrixAchat($prixAchat)
    {
        $this->prixAchat = $prixAchat;

        return $this;
    }

    /**
     * Get the value of qteAchat
     */ 
    public function getQteAchat()
    {
        return $this->qteAchat;
    }

    /**
     * Set the value of qteAchat
     *
     * @return  self
     */ 
    public function setQteAchat($qteAchat)
    {
        $this->qteAchat = $qteAchat;

        return $this;
    }

    /**
     * Get the value of montStock
     */ 
    public function getMontStock()
    {
        return $this->montStock;
    }

    /**
     * Set the value of montStock
     *
     * @return  self
     */ 
    public function setMontStock($montStock)
    {
        $this->montStock = $montStock;

        return $this;
    }

    public static function toArticleConfection($row):ArticleConfection{
        $articleConfection=new ArticleConfection();
        $articleConfection->setId($row['id']);
        $articleConfection->setLibelle($row['libelle']);
        $articleConfection->setPrixAchat($row['prixAchat']);
        $articleConfection->setQteStock($row['qteStock']);
        $articleConfection->setMontStock($row['montStock']);
        $articleConfection->setQteAchat($row['qteAchat']);
        $articleConfection->setCategorie($row['categorie']);
        return $articleConfection;

    }


}