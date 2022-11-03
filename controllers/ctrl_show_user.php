<?php
    include './utils/bdd_connect.php';
    include './models/mdl_user.php';
    include './managers/mngr_user.php';
    include './views/view_profil.html';
    $message = "";
    // instance of ManagerUser object
    $util = new managerUtilisateur(null, null, null, null);
    // save result in showAllUser
    $liste = $util->showUtilById($bdd);
//   visit the array
    foreach($liste as $value){        
        echo'<li>
                '.$value['nom_util'].', '.$value['prenom_util'].', '.$value['mail_util'].'
                <a href="/babyCommunity/modifUser?id='.$value['id_util'].'"><img src="./medias/crayon-50.png"class="logo"></a>
                <a href="/babyCommunity/deleteUser?id='.$value['id_util'].'"><img src="./medias/supprimer-80.png"class="logo"></a>
            </li>';
    }
    echo $message;
?>