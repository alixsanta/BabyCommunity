<?php 
    /* ------------------------------ IMPORTS ------------------------------ */
    include './utils/connectBdd.php';
    include './models/model_util.php';
    include './views/view_inscription_connexion.php';


        /* ------------------------------ LOGIQUE ------------------------------ */
    // /**
    //  * logique pour la liste des categorie
    //  */
    // // on creer une nouvelle instance des annonces
    // $all = new Annonce(null);
    // // on recupere la liste des annonces en BDD
    // $data = $all->getAllAnnonce($bdd);
    // foreach($data as $value){
    //     echo '
    //     <script>
    //         addOption("'.$value->nom_annonce.'", "'.$value->id_annonce.'");
    //     </script>';
    // }


    
     // logique pour l'ajout d'un utilisateur

    // on verifie si les champs sont remplis et non vide
    if(isset($_POST['nom_util']) AND isset($_POST['prenom_util']) AND isset($_POST['mail_util']) AND isset($_POST['mdp_util']) && ($_POST['nom_util'] != "") &&
     ($_POST['prenom_util'] != "") && ($_POST['mail_util'] != "") && ($_POST['mdp_util'] != "")){
        $nom = $_POST['nom_util'];
        $prenom = $_POST['prenom_util'];
        $mail = $_POST['mail_util'];
        $mdp = $_POST['mdp_util'];
    }
    else{
        echo "<p>Veuillez remplir tous les champs du formulaire</p>";
    }

?>

