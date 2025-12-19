<?
include_once "vue_generique.php";
class VueCompMenu extends VueGenerique {
    private $affichage;

    public function __construct($menu) {
        $this->affichage = "<nav>";
        foreach ($menu as $section) {
            $this->affichage .= "<a href='".$section["lien"]."'>".$section["titre"]."</a><br>";
        }
        $this->affichage .= "</nav>";
    }

    public function getAffichage() {
        return $this->affichage;
    }
}