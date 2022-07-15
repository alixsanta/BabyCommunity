<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/style/login.css">
    <!-- <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"> -->
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com"> -->
    <!-- <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> -->
    <!-- <link href="https : //fonts.googleapis.com/css2?family= Poppins: wght @300 & display=swap" rel="stylesheet"> -->
    <title>Baby Community</title>
</head>
<body>
<header>
    <nav>
      <ul>
        <li id="logo"><a href="http://localhost/filRouge/">Baby Community</a></li>
        <li><a href="http://localhost/filRouge/login">Connexion</a></li>
        <li><a href="http://localhost/filRouge/annonces">Les annonces</a></li>
        <li><a href="#">Les activités</a></li>
      </ul>
    </nav>

    <div id="imgPrincipale">
      <h1>Baby Community</h1>
      <div id="firstTrait"></div>
      <h3>Le site communautaire pour les parents autour des enfants</h3>
    </div>
  </header>

    <!-- FORMULAIRE DE CONNEXION -->
    <div class="form">
        <div class="contentCo">
            <h3>Se connecter</h3>
            <form action="" method="post">
                <p>Email</p>
                <input type="mail" name="email_connexion" id="mail" required>
                <p>Mot de passe</p>
                <input type="password" name="mdp_connexion" id="mdp" required>
                <p><input class="btn" type="submit" value="Connexion" name="Se connecter"></p>
            </form>
        </div>
        <span class="vertical line"></span>
            <!-- FORMULAIRE D'INSCRIPTION -->
        <div class="contentIns">
            <h3>S'inscrire</h3>
            <form action="" method="post">

                <p>Pseudo :</p>
                <input type="text" name="prenom_inscription" required>
                <p>Email :</p>
                <input type="email" name="email_inscription" required>
                <p>Adresse :</p>
                <input type="text" name="adresse_inscription" required>
                <p>Mot de passe</p>
                <input type="password" name="mdp_inscription" required>
                <p><input class="btnIns" type="submit" value="Inscription" name="inscription" required></p>
            </form>
        </div>
    </div>

    <footer>
            <ul id="foot">
                <li><a href="mentions.html">Mentions légales</a></li>
                <li><a href="https://www.instagram.com/kfc.es/?hl=fr"><img src=".assets/images/instagram.png"></a></li>
                <li><a href="https://twitter.com/KFC_ES"><img src=".assets/images/twitter.png"></a></li>
                <li><a href="https://twitter.com/KFC_ES"><img src=".assets/images/pinterest.png"></a></li>
            </ul>
    </footer>
</body>
</html>