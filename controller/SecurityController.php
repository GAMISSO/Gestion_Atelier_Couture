<?php
require_once "./../service/CompteService.php";
require_once "./../controller/Controller.php";

class SecurityController extends  Controller{
    private CompteService $userService;

    public function __construct(){
        parent::__construct();
        $this->userService = new CompteService();
        $this->layout="connexion";
        $this->callAction() ;
    }

    public function callAction(){
        $action=$_REQUEST['action']??"form";
        switch($action){
            case 'form':
                $this->loadForm();
                break;
            case 'login':
                $this->login();   
                break;
            case 'logout':
                $this->logout();
                break;   
        }
    }

    public function login(){
        //1-Recuperer
        extract($_REQUEST);
        //2-Validation
        $this->validator->isEmpty($login,'username',"le username est obligatoire");
        // $this->validator->isEmail($login,'username',"le username  doit etre un nom");
        $this->validator->isEmpty($password,'password',"Password est obligatoire");
        //3-Authentification
        if ($this->validator->isValid()) {
            $user= $this->userService->seConnecter($login,$password);
            if ($user==null) {
                $this->validator->addErreur("connexion","username ou Password incorrect");
                $_SESSION['erreurs']= $this->validator->getErreurs();
                header("location:index.php");
                exit;
            }
            $_SESSION['user']=$user->toArray();      
            header("location:index.php?controller=article&action=list");
        }else{
                $_SESSION['erreurs']= $this->validator->getErreurs();
                header("location:index.php");
                exit;
        }  
    }

    public function loadForm(){
        $this->renderView("security/login",[]);
    }

    public function logout(){
        $_SESSION['user']=array();
        unset($_SESSION['user']);
        session_unset();      
        session_destroy();
        header("location:index.php?controller=security&action=form");
    }
}