<?php 

include_once "modules/mod_buvettes/modele_buvette.php";
include_once "modules/mod_buvettes/vue_buvette.php";

class ContBuvette{

    private $modele;
    public $vue;
    public $action;

    public function __construct()
    {
        $this -> modele = new ModeleBuvette();
        $this -> vue = new VueBuvette();
        $this -> action = isset($_GET['action']) ? $_GET['action'] : "accueil";
    
    }

    public function liste(){
        $tab = $this->modele->getListe();
        $this->vue->affiche_liste($tab);
    }

    public function details(){
    
        if(!isset($_GET['id'])){
            echo "Aucune buvette specifiee.";
            return;
        }

        $id = $_GET['id'];
        $buvette = $this->modele->getBuvette($id);
        $produits = $this->modele->getProduits($id);
        $this->vue->affiche_details($buvette,$produits);
    }

}

?>