<?php
require_once "./../service/ArticleConfectionService.php";
require_once "./../service/ArticleVenteService.php";
require_once "./../service/CompteService.php";
require_once "./../model/ArticleConfection.php";
require_once "./../service/CategorieService.php";
require_once "./../model/ArticleVente.php";
require_once "./../controller/Controller.php";
class ArticleController extends Controller{

    private ArticleConfectionService $articleConfectionService;
    private ArticleVenteService $articleVenteService;

    private CompteService $userService;

    public function __construct(){
        parent::__construct();
        $this->articleConfectionService = new ArticleConfectionService();
        $this->articleVenteService = new ArticleVenteService();
        $this->userService = new CompteService();
        $this->callAction();
    }

    public function callAction(){
        if (!isset($_SESSION['user'])) {
            header("location:index.php");
            exit;
        }
        $action =$_REQUEST['action']??"list";//form
        switch ( $action) {
            case 'list':
                $this->showList();
                break;
            case 'form':
                    $this->loadForm();
                    break;
                case 'create':
                    $this->createArticleConfection();
                        break;
            default:
                # code...
                break;
        }
    }

    public function loadForm(){
        $categorieService= new CategorieService();
        // var_dump($categorieService->listerCategorie());
        $categories=$categorieService->listerCategorie();
        $articleConfections= $this->articleConfectionService->listerArticleConfection();
        $this->renderView("article/form",[
            "articleConfections"=>$articleConfections,
            "categories"=>$categories
        ]);
    }

    public function createArticleConfection(){
             //1-Recuperer les donnees du Formulaire
            extract($_REQUEST);
            $prixAchat = $_POST['prixAchat'];
            $qteStock = $_POST['qteStock'];
            $categorie = $_POST['categorie'] ?? '';
            $libelle = $_POST['libelle'] ?? '';
             //2-Valider les donnees
            if ($this->validator->isEmpty($categorie,'categorie',"Veuiller  Selectionnez un catégorie")){
                    unset($_POST['categorie']);
            }

            if ($this->validator->isEmpty($libelle,'libelle',"le libellle est obligatoire")){
                    unset($_POST['libelle']);
            }
            
            if ($this->validator->isEmpty($libelle,'qteStock',"Le qteStock est obligatoire") || !$this->validator->isNumber($qteStock,'qteStock',"Le qte Stock superieur doit etre superieur a  0")){
                    unset($_POST['qteStock']);
            }
             //$erreurs contient des valeurs ==> c'est a dire il y'a erreur
            if ($this->validator->isValid()) {
                
                $montant = $prixAchat * $qteStock;
                $qteAchat =$qteStock;
                $articleConfection=new ArticleConfection();
                $articleConfection->setLibelle($libelle);
                $articleConfection->setQteStock($qteStock);
                $articleConfection->setPrixAchat($prixAchat);
                $articleConfection ->setMontStock($montant);
                $articleConfection->setCategorie($categorie);
                $articleConfection->setQteAchat($qteAchat);
                $this->articleConfectionService->addArticleConfection($articleConfection);
                header("location:index.php?controller=article&action=list");
                exit;
            }else{
                $_SESSION['erreurs']= $this->validator->getErreurs();
                $_SESSION['data']= $_POST;

                header("location:index.php?controller=article&action=form");
                exit;
            }
    

        //Redirection
        
    }


    public function showList(){
        
        $id=$_REQUEST['id']??"";
        $currentPage=$_REQUEST['page']??1;
        $clientId=$_SESSION['user']['role']=="Admin"?null:$_SESSION['user']['id'];
        $nbrePage=0;
        if(empty($numero)){
            $articleConfections=$this->articleConfectionService->listerArticleConfection($clientId,$currentPage);
            $nbrePage=$this->articleConfectionService->getNbrePage();
        }else{
            $numero=$_REQUEST['numero'];
            $articleConfection=$this->articleConfectionService->searchArticleConfectionbyId($id);
            $articleConfections=[];
            if ($articleConfection!=null) {
                $articleConfections=[$articleConfection];
                $nbrePage=1;
            }
        }
        $data=[
        "articleConfections"=> $articleConfections,
        "nbrePage"=> $nbrePage,
        ];
            $this->renderView("article/list",$data);
    }


}