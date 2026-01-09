<?php
class VueProfil
{
    public function __construct()
    {
    }
    public function afficherNomEtPrenom($nom,$prenom){
        echo"<br>".$nom."      ".$prenom."<br>";
    }

    public function afficherPhoto($photo){
        echo "<br><img src='$photo' alt='Photo de profil'><br>";
    }

}