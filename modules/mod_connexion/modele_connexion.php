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
            if($this->loginDejaUtilisé($_POST['login']))
                echo("Login déja utilisé");
            else {
                $mdp = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $sth = self::$bdd->prepare('insert into utilisateur (login, password) values(?,?)');
                $sth->execute([$_POST['login'], $mdp]);
                echo("Ajout du compte effectué");
            }
        }
    }
    public function seConnecter($user){
        if (isset($_POST['login']) && isset($_POST['password'])) {
            $sth = self::$bdd->prepare('SELECT login,password From utilisateur where login= :login;');
            $sth->bindParam(':login',$user);
            $sth->execute();
            return $sth->fetch();
        }
        else
            return false;
    }

//    public function seConnecter($login, $password){
//
//            $sth = self::$bdd->prepare('SELECT password FROM utilisateur WHERE login = :login');
//        $sth->bindParam(':login', $login);
//        $sth->execute();
//        $res=$sth->fetch();
//
//        if ($res && password_verify($password, $res['password']))
//            return true;
//        else
//            return false;
//    }
    public function loginDejaUtilisé($login){
        $sth = self::$bdd->prepare("SELECT login FROM utilisateur where login= :login;");
        $sth->bindParam(':login',$login);
        $sth->execute();
        if ($sth->fetch()!=NULL)
            return true;
        else
            return false;
    }
}
?>