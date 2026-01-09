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
    public function getPhoto($login){
        $sth = self::$bdd->prepare("SELECT photo FROM utilisateur where login= :login;");
        $sth->bindParam(':login',$login);
        $sth->execute();
        $photo = $sth->fetch();
        return $photo['photo'];
    }

}
