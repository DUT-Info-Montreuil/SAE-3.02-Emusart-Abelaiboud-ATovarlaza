<?php
session_start();
include_once "modules/mod_connexion/mod_connexion.php";
include_once "Controleur.php";
include_once "composants/comp_menu/cont_menu.php";

Connexion::initConnexion();
$menu= new ControleurCompMenu();
$GLOBALS['menu']=$menu;
$contenu = "";
if (isset($_GET['module'])) {
    $module = $_GET['module'];
    switch ($module) {
        case 'connexion':
            $module = new ModConnexion;
            break;
    }
    $module->exec();
    $contenu = $module->getControleur()->getVue()->getAffichage();
    $GLOBALS['contenu']=$contenu;
}else {
    $controleur = new Controleur();
}


include_once "template.php";
?>