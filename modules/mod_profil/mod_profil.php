<?php
include_once "modele_profil.php";
include_once "cont_profil.php";
class ModProfil
{
    private $controleur;
    public function __construct(){
        $this->controleur=new ContProfil();
    }
    public function exec(){
        switch($this->controleur->getAction()){
            case 'accueil':
                $this->controleur->pageProfil();
        }
    }
    public function getControleur(){
        return $this->controleur;
    }

}
?>