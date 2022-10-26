<?php
    include './utils/bdd_connect.php';
    include './models/model_user.php';
    include './views/view_create_connexion.php';

    if(isset($_POST['login_user']) AND isset($_POST['mdp_user']) AND !empty($_POST['login_user']) AND !empty($_POST['mdp_user'])){
        //récup super globale post
        $mail = $_POST['login_user'];
        $mdp = $_POST['mdp_user'];
        //récup du hash en bdd
        $hash = getUserByMail($bdd, $mail);
        // var_dump($hash);
        if(password_verify($mdp,$hash)){
            echo '<p>Vous êtes connecté</p>';
        }
        //si mauvais mdp
        else{
            echo '<p>mot de passe incorrect</p>';
        }
    }
    else{
        echo '<p>Veuillez remplir le  formulaire</p>';
    }





        // test si l'util a cliqué sur connexion
        if(isset($_POST['connexion'])){
            // test if all fields are filled
            if($_POST['mail_util'] !="" && $_POST['mdp_util'] !=""){
                // save & clean super globals $_POST (password)
                $mdp_util = cleanInput($_POST['mdp_util']);
                $confirm_mdp = cleanInput($_POST['confirm_mdp']);
                // test password matching
                if($mdp_util == $confirm_mdp){
                    // save & clean super globals $_POST
                    $nom_util = cleanInput($_POST['nom_util']);
                    $prenom_util = cleanInput($_POST['prenom_util']);
                    $tel_util = cleanInput($_POST['tel_util']);
                    $mail_util = cleanInput($_POST['mail_util']);
                    $societe = cleanInput($_POST['societe']);
                    $licence = cleanInput($_POST['licence']);
                    $identifiant = cleanInput($_POST['identifiant']);
                    // instance of ManagerUser object (role utilisateur)
                    $user = new ManagerUser($nom_util, $prenom_util, $tel_util, $mail_util, $societe, $licence, $identifiant, $mdp_util, 1);
                    // creation of token
                    $user->setTokenUser(md5($mail_util));
                    // recovery of user account in bdd
                    $test_mail = $user->getUserByMail($bdd);
                    // test existance of user (avoid duplication)
                    if($test_mail == null){
                        // parametre cout (nbr de tour de l'algo de hash)
                        $options = ['cost' => 12,];
                        // hasher password
                        $mdp_util = password_hash($mdp_util, PASSWORD_BCRYPT, $options);
                        // set of password hash
                        $user->setPwdUser($mdp_util);
                        // insertion of account in bdd
                        $user->createUser($bdd);
                        // sending mail to confirm
                        // recovery of token
                        // $hash = $user->getTokenUser();
                        // $user_mail = $mail_util;
                        // $subject = utf8_decode("Votre compte vient d'être crée");
                        // sending mail of activation
    
                        // message of confirmation
                        $message = "<br>Le compte de la société $societe à été crée";
                    }
                    // if user exist
                    else{
                        $message = "Ce compte existe déja";
                    }
                }
                // if password doesn't correspond
                else{
                    $message = "Les mots de passe de correspondent pas";
                }
            }
            else{
                $message = " Tu as oublié un champ l'esprit vif !";
            }
        }
        // if no clicked
        else{
            $message = "n'oublies pas de cliquer sur ajouter";
        }
        echo $message;
?>