<?php
include_once "modele_panier.php";
include_once "vue_panier.php";

class ContPanier
{
    private $modele;
    private $vue;
    public $action;

    public function __construct()
    {
        $this->modele = new ModelePanier();
        $this->vue = new VuePanier();
        $this->action = isset($_GET['action']) ? $_GET['action'] : "panier";
    }

    public function panier()
    {
        $panier = $this->modele->getPanier($_GET['id']);
        $this->vue->afficherPanier($panier);
    }
}
?>