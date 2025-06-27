<?php
require_once "./../config/Validator.php";
abstract class Controller{

    protected $layout="base";
    protected  Validator $validator;

    protected function __construct(){
        if(session_status()==PHP_SESSION_NONE){
            session_start();
        }
        $this->validator = new Validator();
    }

    protected abstract function callAction();

    protected function renderView(string $path,array $data=[]){
        extract($data);
        ob_start();
        require_once "../view/$path.html.php";
        $view=ob_get_clean();
        // require_once "../view/layout/header.inc.php";
        require_once "../view/layout/$this->layout.layout.php";
    }
}