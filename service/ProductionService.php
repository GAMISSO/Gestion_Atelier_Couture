<?php
require_once "./../model/Production.php";
require_once "./../repositories/ProductionRepository.php";
class ProductionService{
    private ProductionRepository $productionRepository;
    private const LIMIT=2;

    public function __construct(){
        $this->productionRepository = new ProductionRepository();
    }

    //listerClient==>selectAllClient
    //addClient==>insertClient
    //miseAJourClient==>updateClient

    public function listerProduction(): array{
        return $this->productionRepository->selectAllProduction();
    }

    public function addProduction(Production $production): void{
        $this->productionRepository->insertProduction($production);
    }

    public function searchClientbyId(string $id): Production|null{
        return $this->productionRepository->selectProductionById($id);
    }

    public function  getNbrePage():int {
        $totalElement=$this->productionRepository->count();
        return ceil( $totalElement/self::LIMIT);
    }

    private function generateNumero():string{
        $lastId=$this->productionRepository->selectLastInsertId();
        return $lastId+1;
    }
}