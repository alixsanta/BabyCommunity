<?php
    include './utils/bdd_connect.php';
    include './utils/function.php';
    include './models/mdl_annonce.php';
    include './managers/mngr_annonce.php';
    include './views/view_profil.php';
    $message = "";


//test si l'id existe
if(isset($_GET['id']) && $_GET['id'] !=""){
    //instance d'un nouvel objet 
    $annonce = new ManagerAnnonce(null, null, null, null);
    //injection de l'id (obj)->setIdAnnonce
    $annonce->setIdAnnonce($_GET['id']);
    //récupération des valeurs de l'annonce (Array)
    $tab = $annonce->showAnnonceById($bdd);
    //stockage des valeurs 
    $titre = $tab[0]['titre_annonce'];
    $contenu =  $tab[0]['contenu_annonce'];
    $prix =  $tab[0]['prix_article'];
    $photo =  $tab[0]['photo_article'];
    //script JS (injection des valeurs existante en bdd)
    echo"<script>
            let titre1 = '$titre';
            let contenu1 = '$contenu';
            let prix1 = '$prix';
            let photo1 = '$photo';
            let titre = document.querySelector('#titre');
            let contenu = document.querySelector('#contenu');
            let prix = document.querySelector('#prix');
            let photo = document.querySelector('#photo');
            titre.value = titre1;
            contenu.value = contenu1;
            prix.value = prix1;
            photo.value = photo1;
        </script>";
    //test si clic sur modifier
    if(isset($_POST['modifier'])){
        //test si les champs sont remplies
        if(isset($_POST['titre_annonce']) && isset($_POST['contenu_annonce']) &&
           isset($_POST['prix_article']) && isset($_POST['photo_article']) &&
           $_POST['titre_annonce'] !="" && $_POST['contenu_annonce'] !="" &&
           $_POST['prix_article'] !="" && $_POST['photo_article'] !=""){
            //instance d'un nouvel objet util avec le constructeur
            $util = new Utilisateur($_POST['titre_annonce'], $_POST['contenu_annonce'],
                                    $_POST['prix_article'], $_POST['photo_article']);
            //affectation de l'id de l'util (setter-> setIdUtil)
            $util->setIdUtil($_GET['id']);
            //modification de l'util
            $util->updateUtil($bdd);
            //récupération des nouvelles données
            $newTitre = $_POST['titre_annonce'];
            $newContenu = $_POST['contenu_annonce'];
            $newPrix = $_POST['prix_article'];
            $newPhoto = $_POST['photo_article'];

            $msg =  "Votre annonce vient d'être modifiée";
            echo "<script>
            titre.value = '$newTitre';
            contenu.value = '$newContenu';
            prix.value = '$newPrix';
            photo.value = '$newPhoto';
            setTimeout(()=>{
                document.location.href='/babyCommunity/profil'; 
                }, 1500);
            </script>";
        }
    }
}
else{
    header('Location: /babyCommunity/profil?noId');
}
//Affichage en JS des Messages 
"<script>zoneMsg.innerHTML = '$msg';</script>";
echo $message;
?>