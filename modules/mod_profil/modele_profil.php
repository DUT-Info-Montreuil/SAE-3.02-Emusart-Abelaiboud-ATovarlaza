<?php
include_once "Connexion.php";
class ModeleProfil extends Connexion
{
    public function __construct()
    {
    }

    public function getNom($login){
        $sth = self::$bdd->prepare("SELECT nom FROM utilisateur where login= :login;");
        $sth->bindParam(':login',$login);
        $sth->execute();
        $nom = $sth->fetch();
        return $nom['nom'];
    }
    public function getPrenom($login){
        $sth = self::$bdd->prepare("SELECT prenom FROM utilisateur where login= :login;");
        $sth->bindParam(':login',$login);
        $sth->execute();
        $prenom = $sth->fetch();
        return $prenom['prenom'];
    }
}
