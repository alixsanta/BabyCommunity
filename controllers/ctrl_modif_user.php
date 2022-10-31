<?php
    include './utils/bdd_connect.php';
    include './utils/function.php';
    include './models/mdl_user.php';
    include './managers/mngr_user.php';
    include './views/view_profil.php';
    $message = "";


//test si l'id existe
if(isset($_GET['id']) && $_GET['id'] !=""){
    //instance d'un nouvel objet 
    $util = new ManagerUtilisateur(null, null, null, null, null, null);
    //injection de l'id (obj)->setIdutil
    $util->setIdUtil($_GET['id']);
    //récupération des valeurs du util (Array)
    $tab = $util->showUtilById($bdd);
    //stockage des valeurs 
    $nom = $tab[0]['nom_util'];
    $prenom =  $tab[0]['prenom_util'];
    $mail =  $tab[0]['mail_util'];
    $mdp =  $tab[0]['mdp_util'];
    //script JS (injection des valeurs existante en bdd)
    echo"<script>
            let nom1 = '$nom';
            let prenom1 = '$prenom';
            let mail1 = '$mail';
            let mdp1 = '$mdp';
            let nom = document.querySelector('#nom');
            let prenom = document.querySelector('#prenom');
            let mail = document.querySelector('#mail');
            let mdp = document.querySelector('#mdp');
            nom.value = nom1;
            prenom.value = prenom1;
            mail.value = mail1;
            mdp.value = mdp1;
        </script>";
    //test si clic sur modifier
    if(isset($_POST['modifier'])){
        //test si les champs sont remplies
        if(isset($_POST['nom_util']) && isset($_POST['prenom_util']) &&
           isset($_POST['mail_util']) && isset($_POST['mdp_util']) &&
           $_POST['nom_util'] !="" && $_POST['prenom_util'] !="" &&
           $_POST['mail_util'] !="" && $_POST['mdp_util'] !=""){
            //instance d'un nouvel objet util avec le constructeur
            $util = new Utilisateur($_POST['nom_util'], $_POST['prenom_util'],
                                    $_POST['mail_util'], $_POST['mdp_util']);
            //affectation de l'id de l'util (setter-> setIdUtil)
            $util->setIdUtil($_GET['id']);
            //modification de l'util
            $util->updateUtil($bdd);
            //récupération des nouvelles données
            $newNom = $_POST['nom_util'];
            $newPrenom = $_POST['prenom_util'];
            $newMail = $_POST['mail_util'];
            $newMdp = $_POST['mdp_util'];

            $msg =  "Vos informations ont été modifiées";
            echo "<script>
            nom.value = '$newNom';
            prenom.value = '$newPrenom';
            mail.value = '$newMail';
            mdp.value = '$newMdp';
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