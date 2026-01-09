<?php
include_once "Connexion.php";
class ModeleConnexion extends Connexion
{
    public function __construct()
    {
    }
    public function ajouterNouveauCompte()
    {
        if (isset($_POST['login']) && isset($_POST['password']) && isset($_POST['nom']) && isset($_POST['prenom'])){
            if($this->loginDejaUtilisé($_POST['login']))
                echo("Login déja utilisé");
            else {
                $mdp = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $sth = self::$bdd->prepare('insert into utilisateur (login, password,nom,prenom) values(?,?,?,?)');
                $sth->execute([$_POST['login'], $mdp,$_POST['nom'],$_POST['prenom']]);
                if (isset($_FILES['photo']))
                    $this->modifierPhoto();
                echo("Ajout du compte effectué");
            }
        }
        else{
            echo("Erreur, informations incomplètes!");
        }
    }
    public function seConnecter($user){
        if (isset($_POST['login']) && isset($_POST['password'])) {
            $sth = self::$bdd->prepare('SELECT login,password From utilisateur where login= :login;');
            $sth->bindParam(':login',$user);
            $sth->execute();
            return $sth->fetch();
        }
        else
            return false;
    }
    public function modifierPhoto(){
            $photo = $_FILES['photo'];
            if (!$this->nomLogoExisteDeja()) {
                $chemin = "ressources/photo_de_profil/" . basename($photo['name']);
                $extensionDuFichier = pathinfo($photo['name'], PATHINFO_EXTENSION);
                $extensionsAutorisees = ["jpg", "gif", "png", "jpeg"];
                if (in_array($extensionDuFichier, $extensionsAutorisees)) {
                    $mimeContent = mime_content_type($photo['tmp_name']);
                    if (preg_match('/image/', $mimeContent) != false) {
                        move_uploaded_file($photo['tmp_name'], $chemin);


                        $sth = self::$bdd->prepare('update utilisateur SET photo=:photo WHERE login=:login;');
                        $lienphoto = "ressources/photo_de_profil/" . $photo['name'];
                        $sth->bindParam(':photo', $lienphoto);
                        $sth->bindParam(':login', $_POST['login']);
                        $sth->execute();
                        echo("Modification/ajout de la photo de profil effectuée");
                    } else
                        echo "Echec,votre photo de profil n'a pas été ajouté ou modifiée, mime non conforme";
                } else
                    echo "Echec,votre photo de profil n'a pas été ajouté ou modifiée, extension non autorisée";
            } else
                echo "Echec,votre photo de profil n'a pas été ajouté ou modifiée, car elle existe déjà";
        }
        public function nomLogoExisteDeja(){
            $nomphoto = $_FILES['photo']['name'];
            $sth = self::$bdd->prepare('SELECT photo FROM utilisateur WHERE photo = ?;');
            $sth->execute([$nomphoto]);
            $verif = $sth->fetch();
            return $verif !== false;
        }

    public function loginDejaUtilisé($login){
        $sth = self::$bdd->prepare("SELECT login FROM utilisateur where login= :login;");
        $sth->bindParam(':login',$login);
        $sth->execute();
        if ($sth->fetch()!=NULL)
            return true;
        else
            return false;
    }
}
?>