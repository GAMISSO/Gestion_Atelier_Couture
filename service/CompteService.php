<?php

require_once "./../model/Compte.php";
require_once "./../repositories/CompteRepository.php";

class CompteService{
    private CompteRepository $userRepository;

    public function __construct(){
        $this->userRepository = new CompteRepository();
    }

    public function seConnecter(string $username, string $password) : Compte|null{
        return $this->userRepository->selectUserByLoginAndPassword($username, $password);
    }

    public function listeVendeur():array{
        return $this->userRepository->selectAllUserByRole();
    }

    public function listerAll():array{
        return $this->userRepository->selectAllUser();
    }
}