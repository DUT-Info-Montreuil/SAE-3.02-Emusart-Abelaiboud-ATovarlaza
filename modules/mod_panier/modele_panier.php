<?php
include_once "Connexion.php";
class ModelePanier extends Connexion
{
    public function __construct()
    {
        self::initConnexion();
    }

    public function getPanier($id)
    {
        $requete = 'SELECT nom, description, quantite FROM detailPanier NATURAL JOIN produit WHERE idPanier = ?';
        $resultatRequete = self::$bdd->prepare($requete);
        $execreq = $resultatRequete->execute(array($id));

        return $resultatRequete->fetch();
    }
}
?>