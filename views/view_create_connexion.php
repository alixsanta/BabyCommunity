<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/css/style_home.css">
    <title>Baby Community</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li id="logo"><a href="#">Baby Community</a></li>
                <li><a href="#">Connexion</a></li>
                <li><a href="#">Les annonces</a></li>
                <li><a href="#">Les activités</a></li>
            </ul>
        </nav>
    </header>
            <!-- *****SECTION CONNEXION***** -->
    <section>
        <div>
            <h3>Identifiez-vous</h3>
            <form method="post">
                <div>
                    <input type="mail" name="mail_util">
                    <span>saisissez votre email</span>
                </div>

                <div>
                    <input type="password" name="mdp_util">
                    <span>Mot de passe</span>
                </div>

                <div>
                    <input type="submit" value="Se Connecter" name="connexion">
                </div>
            </form>
        </div>
    </section>

            <!-- *****SECTION CREATION COMPTE***** -->
    <section>
        <div>
            <h3>Vous n'avez pas encore de compte ?</h3>
            <p>Créez ici votre compte :</p>
            <form method="post">
                <div>
                    <input type="text" name="nom_util">
                    <span>Votre nom</span>
                </div>
                <div>
                    <input type="text" name="prenom_util">
                    <span>Votre prénom</span>
                </div>
                <div>
                    <input type="mail" name="mail_util">
                    <span>Votre email</span>
                </div>

                <div>
                    <input type="password" name="mdp_util">
                    <span>Un mot de passe</span>
                </div>

                <div>
                    <input type="submit" value="Enregister" name="create">
                </div>
            </form>
        </div>
    </section>


    <footer>
            <ul>
                <li class="ml"><a href="mentions.html">Mentions légales</a></li>
                <div class="reseau">
                    <li><a href="https://www.instagram.com/kfc.es/?hl=fr"><i class="fa-brands fa-instagram" height="100px" width="100px"></i></a></li>
                    <li><a href="https://twitter.com/KFC_ES"><i class="fa-brands fa-facebook"></i></a></li>
                    <li><a href="https://twitter.com/KFC_ES"><img src="" alt=""></i></a></li>
                </div>
            </ul>
    </footer>
</body>
</html>
