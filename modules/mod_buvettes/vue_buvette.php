<?php

include_once "modele_buvette.php";

class VueBuvette{

    private $modele;

    public function  __construct()
    {
        $this->modele = new ModeleBuvette();
    }


    public function affiche_liste($tab = array()){

        echo "<br> Liste des Buvettes : <br>";
        foreach($tab as $elem){
            echo "<a href='index.php?module=mod_buvettes&action=details&id=".$elem['idBuvette']."'>".$elem['nomBuvette']." , ".$elem['adresse']."</a><br>";
        }

    }


    public function affiche_details($buvette,$produits = array()){

        echo "Buvette : ".$buvette['nomBuvette']."<br>";
        foreach($produits as $elem){
            $produit = $this->modele->getProduit($elem['idProduit']);
            echo $produit['nom']. " - " .$elem['prix']. "€ " ."<br>";
        }
    }

    public function menu(){
        $href = "index.php?module=mod_joueurs&action=";
        echo "<a href=".$href."liste>Les Buvettes</a><br>";
    }
}


?>