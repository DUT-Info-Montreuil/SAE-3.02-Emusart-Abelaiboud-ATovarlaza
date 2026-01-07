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

        $requete = 'SELECT * FROM buvette WHERE id = :id';
        $sth = Connexion::$bdd->prepare($requete);
        $sth->execute([':id' => $id]);
        return $sth->fetch();
    }

    public function getProduits($id){
        
        $requete = 'SELECT * FROM produit WHERE IN (SELECT idProduit FROM contient WHERE idBuvette = :id)';
        $sth = Connexion::$bdd->prepare($requete);
        $sth->execute([':id' => $id]);
        
        return $sth -> fetchAll();
    }
}

?>