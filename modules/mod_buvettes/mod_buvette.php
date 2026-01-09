<?php

include_once "modules/mod_buvettes/cont_buvette.php";

class ModBuvette{

    private $controleur;


    public function __construct()
    {
        $this->controleur = new ContBuvette();

    }

    public function exec(){

//        $this->controleur->vue->menu();

        switch ($this -> controleur ->getAction()){
            case 'liste':
                $this->controleur->liste();
                break;
            case 'details':
                $this->controleur->details();
                break;
        }
    }
}

