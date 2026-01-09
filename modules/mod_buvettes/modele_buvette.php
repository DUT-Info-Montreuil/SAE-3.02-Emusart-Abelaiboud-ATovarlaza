<?php

class ModeleBuvette{

    public function __construct()
    {

    }

    public function getListe(){

        $requete = 'SELECT * FROM buvette';
        $sth = Connexion::$bdd->query($requete);

        return $sth->fetchAll();

    }

    public function getBuvette($id){

        $requete = 'SELECT * FROM buvette WHERE idBuvette = :id';
        $sth = Connexion::$bdd->prepare($requete);
        $sth->execute([':id' => $id]);
        return $sth->fetch();

    }

    public function getProduit($id){
        $requete = 'SELECT * FROM produit WHERE idProduit = :id';
        $sth = Connexion::$bdd->prepare($requete);
        $sth->execute([':id' => $id]);
        return $sth->fetch();
    }


    public function getProduitsDeBuvette($id){

        $requete = 'SELECT * FROM Propose WHERE idBuvette = :id';
        $sth = Connexion::$bdd->prepare($requete);
        $sth->execute([':id' => $id]);

        return $sth -> fetchAll();
    }
}

?>