<?php
    //connexion à la BDD
    $bdd = new PDO('mysql:host=localhost;dbname=babycommunity', 'root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
?>