<?php
include_once "vue_profil.php";
include_once  "modele_profil.php";
class ContProfil
{
    private $modele;
    private $vue;
    private $action;

    public function __construct()
    {
        $this->modele = new ModeleProfil();
        $this->vue = new VueProfil();
        $this->action = isset($_GET['action']) ? $_GET['action'] : "accueil";
    }

    public function pageProfil(){
        $login=$_SESSION['user'];
        $nom=$this->modele->getNom($login);
        $prenom=$this->modele->getPrenom($login);
        $photo=$this->modele->getPhoto($login);
        $this->vue->afficherPhoto($photo);
        $this->vue->afficherNomEtPrenom($nom,$prenom);

    }
    public function getAction(){
        return $this->action;
    }

}