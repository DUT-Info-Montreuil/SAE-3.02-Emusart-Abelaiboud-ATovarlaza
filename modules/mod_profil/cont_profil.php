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

    public function getNomEtPrenom(){
        return $this->modele->getNomEtGetPrenom($_SESSION['user']);
    }
    public function pageProfil(){
        $nom=$this->modele->getNom($_SESSION['user']);
        $prenom=$this->modele->getPrenom($_SESSION['user']);
        $this->vue->afficherNomEtPrenom($nom,$prenom);
    }
    public function getAction(){
        return $this->action;
    }

}