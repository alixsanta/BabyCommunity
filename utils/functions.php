<?php
    // nettoie le code
    function cleanInput($input){
        return htmlspecialchars(strip_tags(trim($input)));
    }

    //récupère le format du fichier (extension)
    function get_file_extension($file){
        return substr(strrchr($file,'.'),1);
    }
?>