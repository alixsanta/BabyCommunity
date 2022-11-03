<?php 
    include './utils/bdd_connect.php';
    include './utils/functions.php';
    include './models/mdl_user.php';
    include './managers/mngr_user.php';
    include './views/view_create_connexion.php';
    $message = "";


    // test si l'util a cliqué sur connexion
    if(isset($_POST['creation'])){
        // test if all fields are filled
        if($_POST['nom_util'] !="" && $_POST['prenom_util'] !="" &&
           $_POST['mail_util'] !="" && $_POST['mdp_util'] !=""){
            // save & clean super globals $_POST (password)
            $mdp_util = cleanInput($_POST['mdp_util']);
            $confirm_mdp = cleanInput($_POST['confirm_mdp']);
            // test password matching
            if($mdp_util == $confirm_mdp){
                    // save & clean super globals $_POST
                    $nom_util = cleanInput($_POST['nom_util']);
                    $prenom_util = cleanInput($_POST['prenom_util']);
                    $mail_util = cleanInput($_POST['mail_util']);
                    // instance of ManagerUser object (role utilisateur)
                    $util = new ManagerUtilisateur($nom_util, $prenom_util, $mail_util, $mdp_util);
                    // creation of token
                    $util->setTokenUser(md5($mail_util));
                    // recovery of user account in bdd
                    $test_mail = $util->getUserByEmail($bdd);
                    // test existance of user (avoid duplication)
                    if($test_mail == null){
                        // parametre cout (nbr de tour de l'algo de hash)
                        $options = ['cost' => 12,];
                        // hasher password
                        $mdp_util = password_hash($mdp_util, PASSWORD_BCRYPT, $options);
                        // set of password hash
                        $util->setPwdUser($mdp_util);
                        // insertion of account in bdd
                        $util->createUser($bdd);
                        // sending mail to confirm
                        // recovery of token
                        $hash = $user->getTokenUser();
                        $user_mail = $mail_util;
                        $subject = utf8_decode("Votre compte vient d'être crée");
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