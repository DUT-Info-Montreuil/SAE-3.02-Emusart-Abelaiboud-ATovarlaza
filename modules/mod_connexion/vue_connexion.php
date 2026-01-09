<?php
class VueConnexion{
    public function __construct()
    {
    }
    public function erreurConnexion(){
        echo'Erreur de Connexion, le nom d\'utilisateur ou le mot de passe ne correspond pas.';
    }
    public function afficher_form_inscription(){
        ?>
        <br><form action='index.php?module=connexion&action=inscription' enctype="multipart/form-data" method='POST'>

            Pseudo: <input type = 'text' name ='login' placeholder='Identifiant'><br>
            Nom: <input type = 'text' name ='nom' placeholder='Nom'><br>
            Prénom: <input type = 'text' name ='prenom' placeholder='Prénom'><br>
            Mot de Passe: <input type="password" name ="password" placeholder='Mot de passe'><br>
            Photo de Profil (optionnel)<input type ='file' name ='photo' placeholder="photo de profil"><br>

            <input type="submit" value="envoyer">
        </form>

        <?php
    }
    public function afficherLienInscription(){
        echo"Pas de compte? Inscrivez vous ici:<a href="."index.php?module=connexion&action=inscription>Inscription</a><br>";
    }
    public function afficher_form_connexion(){
        ?>
        <br><form action='index.php?module=connexion&action=connecte' method='POST'>

            Pseudo: <input type = 'text' name ='login' placeholder='identifiant'><br>
            Mot de Passe: <input type="password" name ="password" placeholder='mot de passe'><br>
            <input type="submit" value="envoyer">
        </form>

        <?php
    }
    public function afficherDeconnexion(){
        echo "<a href="."index.php?module=connexion&action=deconnexion>Deconnexion</a><br>";

    }
    public function connexionReussie(){
        echo"<br>Vous êtes connecté sous l'identifiant ".$_SESSION['user'].".<br>";
    }

    public function connecte(){
        echo"Vous êtes connecté.<br>";
    }
    public function deconnexionReussie(){
        echo"Déconnexion réussie.<br>";
    }

}
?>