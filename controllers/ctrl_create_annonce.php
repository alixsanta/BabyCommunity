<?php
    include './utils/bdd_connect.php';
    include './utils/functions.php';
    include './models/mdl_annonce.php';
    include './managers/mngr_annonce.php';
    include './views/view_post_annonce.html';
    $message = "";

    if(isset($_POST['poster'])){
    if($_POST['id_util'] !="" && $_POST['date_enlevement'] !="" && $_POST['heure_enlevement'] !="" &&
           $_POST['adresse_enlevement'] !="" && $_POST['ville_enlevement'] !="" &&
           $_POST['pays_enlevement'] !="" && $_POST['date_livraison'] !="" &&
           $_POST['heure_livraison'] !="" && $_POST['adresse_livraison'] !="" &&
           $_POST['ville_livraison'] !="" && $_POST['pays_livraison'] !=""){
            $dateE = cleanInput($_POST['date_enlevement']);
            $heureE = cleanInput($_POST['heure_enlevement']);
            $adresseE = cleanInput($_POST['adresse_enlevement']);
            $villeE = cleanInput($_POST['ville_enlevement']);
            $paysE = cleanInput($_POST['pays_enlevement']);
        
            $dateL = cleanInput($_POST['date_livraison']);
            $heureL = cleanInput($_POST['heure_livraison']);
            $adresseL = cleanInput($_POST['adresse_livraison']);
            $villeL = cleanInput($_POST['ville_livraison']);
            $paysL = cleanInput($_POST['pays_livraison']);

            $course = new ManagerDossier($dateE, $heureE, $adresseE, $villeE, $paysE, $dateL, $heureL, $adresseL, $villeL, $paysL);
            // var_dump($course);
            $course->createCourse($bdd);
            $message = "La course vient d'être envoyée";
        }
        else{
            $message = " Tu as oublié un champ l'esprit vif !";
        }
    }
    else{
        $message = "N'oublies pas de cliquer sur envoyer";
    }
    echo $message;
?>