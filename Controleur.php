<?php
include_once "Vue.php";
include_once "Modele.php";
    class Controleur
    {

        private $modele;
        private $vue;

        public function __construct()
        {
            $this->modele = new Modele;
            $this->vue = new Vue;
        }
    }



?>