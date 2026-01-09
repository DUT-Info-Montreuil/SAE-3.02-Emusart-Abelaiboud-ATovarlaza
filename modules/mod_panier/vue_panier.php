<?php
class VuePanier
{
    public function __construct()
    {

    }

    public function afficherPanier($panier)
    {
        echo "nom : " . $panier['nom'] . " | qte : " . $panier['quantite'] . " |  description : " . $panier['description'] . "<br>";
    }
}
?>