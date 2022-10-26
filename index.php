<?php
		include './utils/bdd_connect.php';
		// include './utils/functions.php';
	// if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
	// 	$uri = 'https://';
	// } else {
	// 	$uri = 'http://';
	// }
	// $uri .= $_SERVER['HTTP_HOST'];
	// header('Location: '.$uri.'/dashboard/');
	// exit;

    //Analyse de l'URL avec parse_url() et retourne ses composants
    $url = parse_url($_SERVER['REQUEST_URI']);
    //test soit l'url a une route sinon on renvoi à la racine
    $path = isset($url['path']) ? $url['path'] : '/';
    
    //routeur
    switch ($path) {
        //cas route vide (accueil)
        case '/babyCommunity/home':
            include './views/view_home.php';
            break;
        //cas route ajouter un formulaire de contact
        case '/babyCommunity/create_co':
            include './controller/ctrl_connexion.php';
            break;
        //cas la route n'existe pas
        default:
            include './view/view_404.php';
            break;
    }
?>