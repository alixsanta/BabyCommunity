<?php
    include './utils/bdd_connect.php';
    include './utils/functions.php';
    include './models/mdl_annonce.php';
    include './managers/mngr_annonce.php';
    include './views/view_post_annonce.php';
    $message = "";

    if(isset($_POST['poster'])){
    if($_POST['titre_annonce'] !="" && $_POST['contenu_annonce'] !="" &&
       $_POST['taille_annonce'] !="" && $_POST['prix_article'] !=""){
            $titre = cleanInput($_POST['titre_annonce']);
            $contenu = cleanInput($_POST['contenu_annonce']);
            $taille = cleanInput($_POST['taille_annonce']);
            $prix = cleanInput($_POST['prix_aarticle']);


            $annonce = new ManagerAnnonce($titre, $contenu, $taille, $prix);
            $annonce->createAnnonce($bdd);
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