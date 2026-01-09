<?php
include_once "cont_panier.php";

class ModPanier
{
    private $controleur;

    public function __construct()
    {
        $this->controleur = new ContPanier();
    }

    public function exec()
    {
        switch ($this->controleur->action)
        {
            case "panier":
                $this->controleur->panier();
                break;
            default:
                break;
        }
    }
}
?>