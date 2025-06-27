
<?php
$controller=$_REQUEST['controller']??"security";

switch ($controller) {
    case 'security':
        require_once "../controller/SecurityController.php";
        $controller=new SecurityController();
        break;

    case'client':
        require_once "../controller/ClientController.php";
        $controller = new ClientController();
        break;
    
    case 'approvisionnement':
        require_once "../controller/ApprovisionnementController.php";
        $controller = new ApprovisionnementController();
        break ;


    case 'article':
        require_once "../controller/ArticleController.php";
        $controller= new ArticleController();
        break ;
    
    case 'compte':
        require_once "../controller/CompteController.php";
        $controller= new CompteController();
        break ;

    case 'Categorie':
        require_once "./../controller/CategorieController.php";
        $controller = new CategorieController();
        break ;

    case 'production':
        require_once "./../controller/ProductionController.php";
        $controller = new ProductionController();
        break ;
    
    case 'fournisseur':
        require_once "./../controller/FournisseurController.php";
        $controller = new FournisseurController();
        break ;
    
    case 'vente':
        require_once "./../controller/VenteController.php";
        $controller = new VenteController();
        break ;
    
    default:
        break;
        
}