<?php
session_start();

include_once "Connexion.php";
include_once "modules/mod_buvettes/mod_buvette.php";

Connexion::initConnexion();


$module = isset($_GET['module']) ? $_GET['module'] : "mod_buvette";
$mod = null;


switch ($module){
    default:
        $mod = new ModBuvette();
        break;
}

?>
