<?php
    session_start();
    // if(isset($_SESSION['connected'])){
    //     include './views/view_home.html';
    // }
    // else{
    //     include './views/view_create_connexion.html';
    // }

	// if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
	//     $uri = 'https://';
	// } else {
	//     $uri = 'http://';
	// }
	// $uri .= $_SERVER['HTTP_HOST'];
	// header('Location: '.$uri.'/babyCommunity/');
	// exit;

    //Analyse de l'URL avec parse_url() et retourne ses composants
    $url = parse_url($_SERVER['REQUEST_URI']);
    //test soit l'url a une route sinon on renvoi à la racine
    $path = isset($url['path']) ? $url['path'] : '/';

    //routeur
    switch ($path) {
        // Accueil
        case '/babyCommunity/home':
            include './views/view_home.html';
            break;

        // formulaire de connexion création
        case '/babyCommunity/create_co':
            include './controllers/ctrl_connexion.php';
            break;

        // page d'annonce
        case '/babyCommunity/annonce':
            include './controllers/ctrl_annonce.php';
            break;

        // poster annonce
        case '/babyCommunity/post':
            include './controllers/ctrl_create_annonce.php';
            break;

        // page de Profil
        case '/babyCommunity/annonce':
            include './controllers/ctrl_annonce.php';
            break;


        //cas la route n'existe pas
        default:
            include './view/view_404.php';
            break;
    }
?>