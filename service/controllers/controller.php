<?php
require_once "./service/databases/config_database.php";
require_once "./service/models/model.php";
class Controller
{
    private $unModele;

    public function __construct($server, $bdd, $user, $mdp)
    {
        $this->unModele = new Modele($server, $bdd, $user, $mdp);
    }

    public function getProduits(){
        return $this->unModele->getProduits();
    }
    public function createProduit($data)
    {
        return $this->unModele->createProduit($data);
    }
    public function connectionUser($data)
    {
        return $this->unModele->connectionUser($data);
    }

}