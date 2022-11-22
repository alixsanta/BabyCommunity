<?php
    include './utils/bdd_connect.php';
    include_once './utils/functions.php';
    include './models/mdl_annonce.php';
    include './managers/mngr_annonce.php';
    include './views/view_post_annonce.html';
    $message = "";



    if(isset($_POST['poster'])){
        if($_POST['titre_annonce'] !="" && $_POST['url_image'] !="" && $_POST['nom_categorie'] !="" && $_POST['contenu_annonce'] !="" &&
           $_POST['taille_annonce'] !="" && $_POST['prix_article'] !=""){
                $titre = cleanInput($_POST['titre_annonce']);
                $image = cleanInput($_POST['url_image']);
                $categorie = cleanInput($_POST['categorie']);
                $contenu = cleanInput($_POST['contenu_annonce']);
                $taille = cleanInput($_POST['taille_annonce']);
                $prix = cleanInput($_POST['prix_article']);
                $exist = getAllAnnonceByValue($bdd, $titre, $contenu);
                //si l'annonce n'existe pas (doublon) ?
                if(empty($exist)){
                    if(isset($_FILES['url_image']) && $_FILES['url_image']['nom_image'] !=""){
                        //stockage des valeurs du fichier importé
                        $nom_image = $_FILES['url_image'] ['nom_image'];
                        $tmp = $_FILES['url_image']['tmp'];
                        $size = $_FILES['url_image']['size'];
                        $error = $_FILES['url_image']['error'];
                        $ext = get_file_extension($_FILES['url_image']);
                        //si taille fichier > 5 Mo (5*1024*1024 octes)
                        if($size>5*1024*1024){
                            $message = "Trop grand, veuillez choisir une photo plus petite";
                        }
                        //si taille OK :
                        else{
                            //format OK (jpg, jpeg)?
                            if(strtolower($ext)=='jpg' OR strtolower($ext)=='jpeg' OR strtolower($ext)=='png'){
                                $img = './assets/medias/'.$nom_image.'.'.$ext;
                            }
                            //mauvais format
                            else{
                                $message = "le fichier n'est pas au bon format";
                            }
                        }
                    }
                    $annonce = new ManagerAnnonce($titre, $contenu, $taille, $prix, $id_categorie, $image);
                    $annonce->createAnnonce($bdd);
                    $message = "$titre vient d'être publiée";
                } else {
                    $message = "Vous avez déja publiée cette annonce";
                }
        } else {
            $message = "Veuillez remplir toutes les informations";
        }

    }
    echo $message;
?>