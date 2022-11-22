<?php
    include './utils/bdd_connect.php';
    include './utils/functions.php';
    include './models/mdl_categorie.php';
    include './managers/mngr_categorie.php';
    include './views/view_post_annonce.html';
    $message = "";

    $categorie = new ManagerCategorie(null);    
    $liste = $categorie->getAllCategory($bdd);
    //boucle pour parcourir la liste
    foreach($liste as $value){
            //construction de la liste
            echo '<option value = '.$value['nom_categorie'].'</option>';
        } 
    //afficher la fin du formulaire
    // echo '</select></p>
    //     <p>Saisir date l\'article</p>
    //     <p><input type="date" name="date_art"></p>
    //     <input type="file" name="img_art">
    //     <p><input type="submit" value="ajouter" name="submit"></p>
    //     </form>';  

?>