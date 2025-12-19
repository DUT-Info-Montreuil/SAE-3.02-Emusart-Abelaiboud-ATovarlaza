<?php
class Connexion{
    public static $bdd;
    public static function initConnexion(){
        $dsn = "mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw201664";
        $user = "dutinfopw201664";
        $pass = "pegunate";
        self::$bdd = new PDO($dsn,$user,$pass);
    }
}
?>
