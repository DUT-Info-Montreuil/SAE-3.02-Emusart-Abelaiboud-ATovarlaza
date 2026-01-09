<?php
//session_start();
//include_once "modules/mod_connexion/mod_connexion.php";
//include_once "Controleur.php";
//
//Connexion::initConnexion();
//include_once "composants/comp_menu/cont_menu.php";
//$menu= new ControleurCompMenu();
//$GLOBALS['menu']=$menu;
//$contenu = "";
//if (isset($_GET['module'])) {
//    $module = $_GET['module'];
//    switch ($module) {
//        case 'connexion':
//            $module = new ModConnexion;
//            break;
//    }
//    $module->exec();
//    $contenu = $module->getControleur()->getVue()->getAffichage();
//    $GLOBALS['contenu']=$contenu;
//}else {
//    $controleur = new Controleur();
//}
//
//
//include_once "template.php";
session_start();
include_once "modules/mod_connexion/mod_connexion.php";
include_once "Controleur.php";
Connexion::initConnexion();
if(isset($_GET['module'])) {
    $nomDuModule = $_GET['module'];
    switch ($nomDuModule) {
        case 'connexion':
            $module = new ModConnexion();
            break;
        case 'profil':
            include_once "modules/mod_profil/mod_profil.php";
            $module = new ModProfil();
            break;
        case 'panier':
            include_once "modules/mod_panier/mod_panier.php";
            $module = new ModPanier();
            break;
        case 'buvettes':
            include_once "modules/mod_buvettes/mod_buvette.php";
            $module= new ModBuvette();
            break;
    }
    $module->exec();
}
else{
    $controleur=new Controleur();
}
if (isset($_SESSION['user'])) {
    echo "<a href=" . "index.php?module=connexion&action=deconnexion>Deconnexion</a><br>";
    echo "<a href=" . "index.php?module=profil&action=accueil>Profil</a><br>";
    echo "<a href=" . "index.php?module=panier&action=panier>Panier</a><br>";
    echo "<a href=" . "index.php?module=buvettes&action=liste>Buvettes</a><br>";
} else {
    echo "<a href=" . "index.php?module=connexion>Connexion</a><br>";

}
?>