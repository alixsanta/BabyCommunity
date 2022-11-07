<?php
    include './utils/bdd_connect.php';
    include './utils/functions.php';
    include './models/mdl_user.php';
    include './managers/mngr_user.php';
    include './views/view_create_connexion.html';
    $message = "";

    if(isset($_GET['deconnexion'])){
        $message = "A bientôt";
    }

    if(isset($_POST['connexion'])){
        if(isset($_POST['mail_util']) && isset($_POST['mdp_util']) && ($_POST['mail_util']) !="" && ($_POST['mdp_util']) !=""){
            //récup super globale post
            $mail = $_POST['mail_util'];
            $mdp = $_POST['mdp_util'];
            //récup du hash en bdd
            $hash = getUserByMail($bdd, $mail);
            // var_dump($hash);
            if(password_verify($mdp,$hash)){
                echo '<p>Vous êtes connecté</p>';
            }
            //si mauvais mdp
            else{
                echo '<p>Le mot de passe est incorrect, veuillez reessayer</p>';
            }
        }
        else{
            echo '<p>Veuillez saisir tous les champs</p>';
        }
    }
?>