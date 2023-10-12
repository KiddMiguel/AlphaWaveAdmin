<?php
class Modele
{
    private $unPDO;

    public function __construct($server, $bdd, $user, $mdp)
    {
        $this->unPDO = null;
        try {
            $url = "mysql:host=" . $server . ";dbname=" . $bdd; 
            $this->unPDO = new PDO($url, $user, $mdp);
        } catch (PDOException $exp) {
            echo "<br/>Erreur de connexion à la base de données !";
            echo $exp->getMessage();
        }
    }
    
    public function getProduits(){
        if($this->unPDO != null){
            try{
            $query = "SELECT * FROM produit ORDER BY idProduit DESC";
            $select = $this->unPDO->prepare($query);
            $select->execute();
            $produits = $select->fetchAll();
            return $produits;
            }catch (PDOException $exp) {
                echo 'Erreur de récupération des produits: ' . $exp->getMessage();
            }
        }
    }

    public function connectionUser($data)
    {
        if ($this->unPDO != null) {
            try {
                $query = "SELECT * FROM admin WHERE BINARY login=:login and BINARY password=:password";
                $select = $this->unPDO->prepare($query);
                $select->bindParam('login', $data['login'], PDO::PARAM_STR);
                $select->bindParam('password', $data['password'], PDO::PARAM_STR);
                $select->execute();
                $user = $select->fetch();
                return $user;
            } catch (PDOException $exp) {
                echo 'Erreur de récupération des produits: ' . $exp->getMessage();
            }
        }
    }

    public function createProduit($data)
    {
        if ($this->unPDO != null) {
            try {
                $query = "INSERT INTO produit (intitule, description, prix, image ) VALUE(:intitule,:description,:prix, :image)";
                $insert = $this->unPDO->prepare($query);
                $insert->bindParam(':intitule', $data["intitule"], PDO::PARAM_STR);
                $insert->bindParam(':description', $data["description"], PDO::PARAM_STR);
                $insert->bindParam(':prix', $data["prix"], PDO::PARAM_STR);
                $insert->bindParam(':image', $data["image"], PDO::PARAM_STR);
                $insert->execute();
                return true;
            } catch (PDOException $exp) {
                echo 'Erreur insertion produit : ' . $exp->getMessage();
            }
        }
    }
    
}