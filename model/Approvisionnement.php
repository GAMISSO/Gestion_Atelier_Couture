<?php
// require_once './Fournisseur.php';
// require_once './ArticleConfection.php';
class Approvisionnement{
    private int $id=0;

    private \DateTime $dateApprovi;

    //jointure fournisseur
    private string $fournisseur;

    //jointure articleConfection
    private string $articleConfection;

    private int $qteStock;

    private int $monActuelStock;




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
     * Get the value of dateApprovi
     */ 
    public function getDateApprovi()
    {
        return $this->dateApprovi;
    }

    public function getDateApproviToString():string{
        return $this->dateApprovi->format("d-m-y");
    }

    /**
     * Set the value of dateApprovi
     *
     * @return  self
     */ 
    public function setDateApprovi($dateApprovi)
    {
        $this->dateApprovi = $dateApprovi;

        return $this;
    }

    /**
     * Get the value of fournisseur
     */ 
    public function getFournisseur()
    {
        return $this->fournisseur;
    }

    /**
     * Set the value of fournisseur
     *
     * @return  self
     */ 
    public function setFournisseur($fournisseur)
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }

    /**
     * Get the value of articleConfection
     */ 
    public function getArticleConfection()
    {
        return $this->articleConfection;
    }

    /**
     * Set the value of articleConfection
     *
     * @return  self
     */ 
    public function setArticleConfection($articleConfection)
    {
        $this->articleConfection = $articleConfection;

        return $this;
    }

    /**
     * Get the value of qteStock
     */ 
    public function getQteStock()
    {
        return $this->qteStock;
    }

    /**
     * Set the value of qteStock
     *
     * @return  self
     */ 
    public function setQteStock($qteStock)
    {
        $this->qteStock = $qteStock;

        return $this;
    }

    /**
     * Get the value of monActuelStock
     */ 
    public function getMonActuelStock()
    {
        return $this->monActuelStock;
    }

    /**
     * Set the value of monActuelStock
     *
     * @return  self
     */ 
    public function setMonActuelStock($monActuelStock)
    {
        $this->monActuelStock = $monActuelStock;

        return $this;
    }

    public static function toApprovisionnement($row):Approvisionnement{
        $approvisionnement=new Approvisionnement();
        $approvisionnement->setId($row['id']);
        $approvisionnement->setFournisseur($row['fournisseur']);
        // $compte->setDateCreation($row['dateCreation']);
        $approvisionnement->setDateApprovi(new DateTime($row['dateApprovi']));
        $approvisionnement->setMonActuelStock($row['monActuelStock']);
        $approvisionnement->setQteStock($row['qteStock']);
        return $approvisionnement;
    }

}