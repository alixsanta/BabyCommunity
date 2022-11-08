<?php 
    // IMPORTS
    include './utils/connectBdd.php';
    include './models/model_users.php';
    include './views/viewLogin.php';


    // LOGIQUE
    // Pour les messages d'erreurs 
    $message = "";

    if(isset($_POST['addUser'])){
        if($_POST['nom_util'] !="" &&
           $_POST['mail_util'] !="" &&
           $_POST['adresse_util'] !="" &&
           $_POST['mdp_util'] !="") {
            
            // création d'un nouvel utilisateur
            $util = new Utilisateur
            ($_POST['nom_util'],
             $_POST['mail_util'],
             $_POST['adresse_util'],
             $_POST['mdp_util']);

            // hashage du mot de passe
            $util -> setPwdUtil(password_hash($util -> getPwdUtil(), PASSWORD_DEFAULT));
            
            // méthode de recherche d'utilisateur pas son mail
            $mail = $util -> showUserByMail($bdd);

            // test si le mail n'existe pas
            if(empty($mail)){
                $util -> createUser($bdd);
                // message compte crée
                $message = 'votre compte '.$util->getMailUtil().' a été crée';
            }
            else {
                // message si compte déja existant
                $message = "Ce compte existe déjà";
            }
        }
        else {
            // message si formulaire incomplet
            $message = "Veuillez compléter tous les champs du formulaire";
        }
    }
    else {
        // si l'utilisateur n'a pas cliqué sur inscription
        $message = "Veuillez cliquer sur inscription pour créer votre compte";
    }
?>

