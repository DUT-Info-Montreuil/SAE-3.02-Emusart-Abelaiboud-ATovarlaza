<?php 

include_once "modules/mod_buvettes/cont_buvette.php";

class ModBuvette{

    private $controleur;


    public function __construct()
    {
        $this -> exec();
    }

    public function exec(){

        $this->controleur = new ContBuvette();
        
        switch ($this -> controleur -> action){
            
            case 'bienvenue':
                echo "Test";
                break;
            case 'liste':
                $this->controleur->liste();
                break;
            case 'details':
                $this->controleur->details();
                break;        
        }
    }
}


?>