<?php
    //session start
    session_start();
    //Analyse de l'URL avec parse_url() et retourne ses composants
    $url = parse_url($_SERVER['REQUEST_URI']);
    //test soit l'url a une route sinon on renvoi à la racine
    $path = isset($url['path']) ? $url['path'] : '/';

    /*--------------------------ROUTEUR -----------------------------*/
    //test de la valeur $path dans l'URL et import de la ressource
    switch($path){
        case $path === "/filRouge/":
            include './controlers/controlerHome.php';
            break;

        case $path === "/filRouge/about":
            include './controlers/controlerAbout.php';
            break;

        case $path === "/filRouge/login":
            include './controlers/controlerLogin.php';
            break;

        case $path === "/filRouge/annonces":
            include './controlers/controlerAnnonces.php';
            break;

        case $path === "/filRouge/about":
            include './controlers/controlerAbout.php';
            break;
        
        case $path === "/filRouge/rechercher":
            include './controlers/controlerLocalisation.php';
            break;
          
        // //route /evalmvc/error -> ./error.php
        // case $path === "/cours_php/evalmvc/error":
        //     include './error.php';
		//     break ;
        // //route en cas d'erreur
        // case $path !== "/cours_php/evalmvc/":
        //     include './error.php';
		//     break ;
    }
?>