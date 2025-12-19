<?php
include_once "vue_connexion.php";
include_once "modele_connexion.php";
class ContConnexion
{
    private $modele;
    private $vue;
    private $action;
    private $user;
    private $password;

    public function __construct()
    {
        $this->modele = new ModeleConnexion();
        $this->vue = new VueConnexion();
        $this->action = isset($_GET['action']) ? $_GET['action'] : "connexion";
        $this->user = isset($_POST['login'])?$_POST['login']:'';
        $this->password = isset($_POST['password'])?$_POST['password']:'';
    }

    public function nouvelleSession()
    {
        $connexionUser = $this->modele->seConnecter($this->user);
        if ($connexionUser!= false) {
            if (password_verify($connexionUser['password'],$this->password) && $this->user == $connexionUser['login']) {
                $_SESSION['user'] = $connexionUser['login'];
                $this->vue->connexionReussie();
                $this->vue->afficherDeconnexion();
            } else {
                $this->vue->erreurConnexion();
            }
        }
    }

    public function deconnexion(){
        unset($_SESSION['user']);
        $this->vue->deconnexionReussie();
        $this->vue->afficher_form_connexion();
    }

    public function inscription(){
        $this->vue->afficher_form_inscription();
        $this->modele->ajouterNouveauCompte();
    }
    public function connexion(){
        $this->vue->afficher_form_connexion();
        $this->vue->afficherLienInscription();
    }
    public function getAction(){
        return $this->action;
    }
    public function getVue(){
        return $this->vue;
    }
}
?>