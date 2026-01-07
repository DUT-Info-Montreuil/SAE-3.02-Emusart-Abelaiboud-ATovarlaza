<?php 

class VueBuvette{

    public function  __construct()
    {
        
    }


    public function affiche_liste($tab = array()){

        echo "<br> Liste des Buvettes : <br>";
        foreach($tab as $elem){
            echo "<a href='index.php?module=mod_buvettes&action=details&id=".$elem['nomBuvette']."'>".$elem['nomBuvette']." , ".$elem['adresse']."</a><br>";
        }

    }


    public function affiche_details($buvette,$produits = array()){

        echo "Buvette : ".$buvette['nom']."<br>";
        foreach($produits as $elem){
            echo $elem['nom']." : ".$elem['description']."<br>"; 
        }
    }
}


?>