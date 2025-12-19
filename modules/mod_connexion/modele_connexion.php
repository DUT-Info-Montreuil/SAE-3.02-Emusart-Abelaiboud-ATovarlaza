<?php
include_once "Connexion.php";
class ModeleConnexion extends Connexion
{
    public function __construct()
    {
    }
    public function ajouterNouveauCompte()
    {
        if (isset($_POST['login']) && isset($_POST['password'])) {
            $mdp = password_hash($_POST['password'],PASSWORD_DEFAULT);
            $sth = self::$bdd->prepare('insert into utilisateur (login, password) values(?,?)');
            $sth->execute([$_POST['login'],$mdp]);
            echo("Ajout du compte effectué");
        }
    }
    public function seConnecter($user){
        if (isset($_POST['login']) && isset($_POST['password'])) {
            $sth = self::$bdd->prepare('SELECT login,password From utilisateurs where login= :login;');
            $sth->bindParam(':login',$user);
            $sth->execute();
            return $sth->fetch();
        }
    }
}
?>