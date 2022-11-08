<?php
    include './utils/bdd_connect.php';
    include './utils/functions.php';
    include './models/mdl_annonce.php';
    include './managers/mngr_annonce.php';
    include './views/view_annonce.html';
    $message = "";

    
    $annonce = new ManagerAnnonce(null, null, null, null, null);
    $liste = $annonce->showAllAnnonces($bdd);
    
    foreach($liste as $value){        
        echo '<li>
                '.$value['speudo_util'].', '.$value['titre_annonce'].', '.$value['contenu_annonce'].', 
                '.$value['url_image'].', '.$value['taille_article'].', '.$value['prix_article'].'
            </li>';
    }
    //affichage fin de la liste zone message erreur et 
    //script affichage des messages d'erreurs
    echo "</ul>
        </div>
        <p id='message'></p>
        <script>
            document.querySelector('#message').innerHTML = '$message';
        </script>
        </body>
        </html>";
    echo $message;
?>