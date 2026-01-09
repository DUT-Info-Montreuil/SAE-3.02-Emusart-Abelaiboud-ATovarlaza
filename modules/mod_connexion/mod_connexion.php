<?php
include_once "modele_connexion.php";
include_once "cont_connexion.php";
class ModConnexion
{
    private $controleur;
    public function __construct(){
        $this->controleur=new ContConnexion();
    }
    public function exec(){
        switch($this->controleur->getAction()){
            case "inscription":
                $this->controleur->inscription();
                break;
            case "connexion":
                ?><br><?php
                $this->controleur->connexion();
                break;
            case 'connecte':
                $this->controleur->nouvelleSession();
                break;
            case 'deconnexion':
                $this->controleur->deconnexion();
                break;
        }
    }
    public function getControleur(){
        return $this->controleur;
    }

}
?>