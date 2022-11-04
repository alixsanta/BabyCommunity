<?php 
    /* ------------------------------ IMPORTS ------------------------------ */
    include './utils/connectBdd.php';
    include './models/model_annonce.php';
    // include './views/view_annonces.php';


    /* ------------------------------ LOGIQUE ------------------------------ */
    /**
     * logique pour la liste des categorie
     */
    // on creer une nouvelle instance de Categorie
    $all = new Categorie(null);
    // on recupere la liste des categories en BDD
    $data = $all->getAllCat($bdd);
    foreach($data as $value){
        echo '
        <script>
            addOption("'.$value->nom_cat.'", "'.$value->id_cat.'");
        </script>';
    }


    /**
     * logique pour l'ajout d'un article
     */
    // on verifie si les champs sont remplis et non vide
    if(isset($_POST['nom_art']) && ($_POST['nom_art'] != "") &&
    isset($_POST['content_art']) && ($_POST['content_art'] != "")){
        $nom = $_POST['nom_art'];
        $content = $_POST['content_art'];
    }
    else{
        echo "<p>Veuillez remplir tous les champs du formulaire</p>";
    }




?>

