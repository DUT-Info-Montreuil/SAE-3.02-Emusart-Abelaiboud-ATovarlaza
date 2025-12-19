<?php
include_once "composants/comp_menu/modele_menu.php";
include_once "composants/comp_menu/vue_menu.php";
class ControleurCompMenu {

    private $vue;

    public function __construct() {
        $modele = new ModeleCompMenu();
        $menu = $modele->getMenu();
        $this->vue = new VueCompMenu($menu);
    }

    public function affiche() {
        echo $this->vue->getAffichage();
    }
}