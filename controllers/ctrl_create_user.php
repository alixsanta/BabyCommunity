<?php 
    include './utils/bdd_connect.php';
    include './utils/functions.php';
    include './models/mdl_user.php';
    include './managers/mngr_user.php';
    include './views/view_create_connexion.html';
    $message = "";


    // test si l'util a cliqué sur connexion
    if(isset($_POST['creation'])){
        // test if all fields are filled
        if($_POST['nom_util'] !="" && $_POST['prenom_util'] !="" && $_POST['pseudo_util'] !="" &&
           $_POST['mail_util'] !="" && $_POST['mdp_util'] !="" && $_POST['confirm_mdp'] !=""){
            // save & clean super globals $_POST (password)
            $mdp = cleanInput($_POST['mdp_util']);
            $confirm_mdp = cleanInput($_POST['confirm_mdp']);
            // test password matching
            if($mdp_util == $confirm_mdp){
                    // save & clean super globals $_POST
                    $nom = cleanInput($_POST['nom_util']);
                    $prenom = cleanInput($_POST['prenom_util']);
                    $pseudo = cleanInput($_POST['pseudo_util']);
                    $mail = cleanInput($_POST['mail_util']);
                    $mdp = cleanInput($_POST['mdp_util']);
                    // instance of ManagerUser object (role utilisateur)
                    $util = new ManagerUtilisateur($nom, $prenom, $pseudo, $mail, $mdp);
                    // creation of token
                    $util->setTokenUtil(md5($mail_util));
                    // recovery of user account in bdd
                    $test_mail = $util->getUserByEmail($bdd);
                    // test existance of user (avoid duplication)
                    if($test_mail == null){
                        // parametre cout (nbr de tour de l'algo de hash)
                        $options = ['cost' => 12,];
                        // hasher password
                        $mdp = password_hash($mdp, PASSWORD_BCRYPT, $options);
                        // set of password hash
                        $util->setMdpUtil($mdp);
                        // insertion of account in bdd
                        $util->createUser($bdd);
                        // sending mail to confirm
                        // recovery of token
                        $hash = $util->getTokenUtil();
                        $user_mail = $mail;
                        $subject = utf8_decode("Votre compte vient d'être crée");
                        // sending mail of activation
    
                        // message of confirmation
                        $message = "<br>Votre compte est maintenant crée";
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
                $message = " Veuillez saisir tous les champs";
            }
        }
        // if no clicked
        else{
            $message = "N'oubliez pas de valider";
        }
        echo $message;
?>