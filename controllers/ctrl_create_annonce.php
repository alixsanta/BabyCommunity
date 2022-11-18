<?php
    include './utils/bdd_connect.php';
    include './utils/functions.php';
    include './models/mdl_annonce.php';
    include './managers/mngr_annonce.php';
    include './views/view_post_annonce.php';
    $message = "";


    $liste = getAllCategory($bdd);
    //boucle pour parcourir la liste
    foreach($liste as $value){
            //construction de la liste
            echo '<option value = '.$value['id_categorie'].'>'.$value['categorie'].'</option>';
            $cpt++;
        } 
    //afficher la fin du formulaire
    // echo '</select></p>
    //     <p>Saisir date l\'article</p>
    //     <p><input type="date" name="date_art"></p>
    //     <input type="file" name="img_art">
    //     <p><input type="submit" value="ajouter" name="submit"></p>
    //     </form>';  

    if(isset($_POST['poster'])){
        if($_POST['url_image'] !="" && $_POST['titre_annonce'] !="" && $_POST['contenu_annonce'] !="" &&
           $_POST['taille_annonce'] !="" && $_POST['prix_article'] !=""){
                $image = cleanInput($_POST['url_image']);
                $titre = cleanInput($_POST['titre_annonce']);
                $categorie = cleanInput($_POST['id_categorie']);
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





            

        

    




    //test 
    //test si le bouton est cliqué
    if(isset($_POST['submit'])){
        //test si les champs input sont remplis
        if(!empty($_POST['nom_art']) AND !empty($_POST['contenu_art']) AND
        !empty($_POST['date_art']) AND !empty($_POST['id_cat'])){
            //stocker les valeurs POST dans des variables
            $nomArticle = cleanInput($_POST['nom_art']);
            $contenuArticle = cleanInput($_POST['contenu_art']);
            $dateArticle = cleanInput($_POST['date_art']);
            $idCat = cleanInput($_POST['id_cat']);
            $exist = getAllArticleByValue($bdd, $nomArticle, $dateArticle);
            //test si l'article n'existe pas (doublon)
            if(empty($exist)){
                //test si on à une image
                if(isset($_FILES['img_art']) AND $_FILES['img_art']['name'] !=""){
                    //stockage des valeurs du fichier importé
                    $name = $_FILES['img_art']['name'];
                    $tmpName = $_FILES['img_art']['tmp_name'];
                    $size = $_FILES['img_art']['size'];
                    $error = $_FILES['img_art']['error'];
                    $ext = get_file_extension($_FILES['img_art']['name']);
                    //test de la taille si plus grand que 5 Mo (5*1024*1024 octes)
                    if($size>5*1024*1024){
                        $message = "le fichier est trop grand taille max 5Mo";
                    }
                    //test si il à la bonne taille
                    else{
                        //test si le format est bon (jpg, jpeg)
                        if(strtolower($ext)=='jpg' OR strtolower($ext)=='jpeg' OR strtolower($ext)=='png'){
                            $img = './asset/image/'.$nomArticle.$dateArticle.'.'.$ext;
                        }
                        //test sinon le format n'est pas bon
                        else{
                            $message = "le fichier n'est pas au bon format";
                        }
                    }
                }
                //test si on n'a pas d'image (image par défaut)
                else{
                    $img = './asset/image/defaut.png';
                }
                createArticle($bdd,$nomArticle, $contenuArticle, $dateArticle, $idCat, $img);
                //message de confirmation
                $message = "l'article : $nomArticle à été ajouté en BDD";
            }
            else{
                $message = "Article : $nomArticle existe déja veuillez le renommer";
            }
        }
        //test si un ou plusieurs champs ne sont pas remplis
        else{
            $message = "Veuillez remplir les champs du formulaire";
        }
    }
    //test si le bouton n'est pas cliqué
    else{
        $message = "Pour ajouter un article veuillez cliquer sur ajouter";
    }
    //affichage des erreurs
    echo $message;
    include './view/view_footer.php';
?>