<?php
require_once "./../service/CompteService.php";
require_once "./../service/ApprovisionnementService.php";
require_once "./../service/ArticleConfectionService.php";
require_once "./../service/FournisseurService.php";
require_once "./../model/Approvisionnement.php";
require_once "./../controller/Controller.php";
class ApprovisionnementController extends Controller{

    private ApprovisionnementService $approvisionnementService;
    private ArticleConfectionService  $articleConfectionService;
    private CompteService $userService;
    public function __construct(){
        parent::__construct();
        $this->approvisionnementService = new ApprovisionnementService();
        $this->articleConfectionService=new ArticleConfectionService();
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
                    $this->createApprovisionnement();
                        break;
            default:
                # code...
                break;
        }
    }


    public function showList(){

        $id=$_REQUEST['id']??"";
        $currentPage=$_REQUEST['page']??1;
        $clientId=$_SESSION['user']['role']=="Admin"?null:$_SESSION['user']['id'];
        $nbrePage=0;
        if(empty($numero)){
            $approvisionnements=$this->approvisionnementService->listerApprovisionnement($clientId,$currentPage);
            $nbrePage=$this->approvisionnementService->getNbrePage();
        }else{
            $numero=$_REQUEST['numero'];
            $approvisionnement=$this->approvisionnementService->searchApprovisionnementbyId($id);
            $approvisionnements=[];
            if ($approvisionnement!=null) {
                $approvisionnements=[$approvisionnement];
                $nbrePage=1;
            }
        }
    $data=[
    "approvisionnements"=> $approvisionnements,
    "nbrePage"=> $nbrePage,
    ];
        $this->renderView("approvisionnement/list",$data);
    }

    public function loadForm(){
        $articleConfectionService=new ArticleConfectionService();
        $approvisionnements= $this->approvisionnementService->listerApprovisionnement();
        $fournisseurService= new FournisseurService();
        $fournisseurs= $fournisseurService->listerFournisseur();
        $articleConfections=$articleConfectionService->listerArticleConfection();
        $this->renderView("approvisionnement/form",[
            "approvisionnements"=>$approvisionnements,
            "articleConfections"=>$articleConfections,
            "fournisseurs"=>$fournisseurs
        ]);
    }

    public function createApprovisionnement(){
             //1-Recuperer les donnees du Formulaire
            extract($_REQUEST);
            $fournisseur = $_POST['fournisseur'];
            $qteStock = $_POST['qteStock'];
            $articleConfection = $_POST['articleConfection'] ?? '';
             //2-Valider les donnees
            if ($this->validator->isEmpty($fournisseur,'fournisseur',"Veuiller  Selectionnez le fournisseur du l'approvisionnement")){
                    unset($_POST['fournisseur']);
            }
            
            if ($this->validator->isEmpty($qteStock,'qteStock',"Le qteStock est obligatoire") || !$this->validator->isNumber($qteStock,'qteStock',"Le qte Stock superieur doit etre superieur a  0")){
                    unset($_POST['qteStock']);
            }
             //$erreurs contient des valeurs ==> c'est a dire il y'a erreur
            if ($this->validator->isValid()) {
                $articleConfectionId = $this->articleConfectionService->getArticle($_POST['articleConfection']);
                $articleConfectionObj = $this->articleConfectionService->searchArticleConfectionbyId($articleConfectionId);
                $newQteStock = $articleConfectionObj->getQteStock() + $qteStock;
                $articleConfectionObj->setQteStock($newQteStock);
                $this->articleConfectionService->updateArticleConfection($articleConfectionObj);
                $montActuelStock = $articleConfectionObj->getPrixAchat()*$articleConfectionObj->getQteStock();
                $approvisionnement=new Approvisionnement();
                $approvisionnement->setArticleConfection($articleConfection);
                $approvisionnement->setFournisseur($fournisseur);
                $approvisionnement->setQteStock($qteStock);
                $approvisionnement->setMonActuelStock($montActuelStock);
                $dateAppro = date('Y-m-d'); // ou date('Y-m-d H:i:s') pour la date et l'heure
                $approvisionnement->setDateApprovi($dateAppro);
                $this->approvisionnementService->addApprovisionnement($approvisionnement);
                header("location:index.php?controller=approvisionnement&action=list");
                exit;
            }else{
                $_SESSION['erreurs']= $this->validator->getErreurs();
                $_SESSION['data']= $_POST;

                header("location:index.php?controller=approvisionnement&action=form");
                exit;
            }
    

        //Redirection
        
    }


}