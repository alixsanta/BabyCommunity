<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"> -->
    <link rel="stylesheet" href="./assets/style/style.css">
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

  <section id="Presentation">
    <div id="intro">
      <h2>Découvrez ce qu'il se passe près de vous</h2>
      <div class="contain">
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.
            Aspernatur totam, fugiat ratione vel perspiciatis possimus ab!
            Dolorum id fugit mollitia rerum itaque eius,
            voluptate magni neque nobis, possimus iure commodi,
            architecto qui doloribus numquam molestiae dignissimos obcaecati
            dolor aperiam iste!</p>
      </div>
    </div>
          <!-- ANNONCES -->
        <h2>Les annonces à la une</h2>
        <div class="cardContainer">

          <div class="card">
            <div class="images">
              <img src="./assets/medias/poussette.jpg" height="200px " width="200px">
            </div>
            <div class="annonce_details">
              <h4>Vend poussette très peu servie</h4>
              <p>70€</p>
              <h6>Aujourd'hui, 15:00</h6>
            </div>
          </div>

          <div class="card">
            <div class="images">
              <img src="./assets/medias/chambre.jpg" height="200" width="200" alt="">
            </div>
            <div class="annonce_details">
              <h4>Chambre d'enfant complète en bon état</h4>
              <p>500€</p>
              <h6>Aujourd'hui, 10:46</h6>
            </div>
          </div>

          <div class="card">
            <div class="images">
              <img src="./assets/medias/duplo.jpg" height="200" width="200" alt="">
            </div>
            <div class="annonce_details">
              <h4>Vend lot de bloc de construction</h4>
              <p>15€</p>
              <h6>hier, 18:00</h6>
            </div>
          </div>
        </div>
        <button class="btn" type="button">Découvrez plus d'annonces</button>


        <!-- ACTIVITES -->
      <h2>Les activités près de chez vous</h2>
      <div class="cardContainer">

        <div class="card">
          <div class="images">
            <a href="#"><img src="./assets/medias/parc.jpg" height="200" width="200" alt=""></a>
          </div>
          <div class="annonce_details">
            <h4 class="annonce_name">Les meilleurs parcs de Grasse et ses alentours</h4>
            <h6 class="publi">Publiée à 13:00</h6>

          </div>
        </div>

        <div class="card">
          <div class="images">
            <a href="#"><img src="./assets/medias/activitéFamille.jpg" height="200" width="200" alt=""></a>
          </div>
          <div class="annonce_details">
            <h4>Activités à faire en famille</h4>
            <h6>Publiée hier à 21:16</h6>

          </div>
        </div>

        <div class="card">
          <div class="images">
            <a href="#"><img src="./assets/medias/assocSportive.jpg" height="200" width="200" alt=""></a>
          </div>
          <div class="annonce_details">
            <h4>Les associations sportives</h4>
            <h6>Publiée le 06 Juillet à 10:31</h6>

          </div>
        </div>
      </div>
      <button class="btn" type="button">Découvrez plus d'annonces</button>
  </section>



<!-- ********* CARITATIF ********* -->
  <section>
    <h2>Côté caritatif</h2>
    <div id="caritatif">
        <a class="imgAssoc plant3"></a>
          <h3>L'association de la semaine</h3>
          <!-- <p>Parrainez un enfant</p> -->
        </div>
    </div>
        <!-- <a href="#"><img src="medias/assoc.jpg" width="400" alt=""></a> -->
      <!-- <div class="card">
        <h4>Les meilleurs parcs près de Grasse et ses alentours</h4>
        <a href="#"><img src="medias/poussette.jpg" width="200" alt=""></a>
      </div>
      <div class="card">
        <h4>Les meilleurs parcs près de Grasse et ses alentours</h4>
        <a href="#"><img src="medias/poussette.jpg" width="200" alt=""></a>
      </div> -->
    <!-- <ul>
      <li id="assos"><p>L'assosiation de la semaine</p></li>
      <li id="dons"><p>Donnez au plus démunis</p></li>
      <li id="couches"><p>les couches</p></li>
    </ul> -->
  </section>


  <!-- ********* FOOTER ********* -->
  <footer>
    <h2 id="contact">Contactez-moi</h2>
    <form>
      <input type="text" placeholder="Nom">
      <input type="text" placeholder="Email">
      <textarea cols="30" rows="10" placeholder="dites moi tout !"></textarea>
      <button>Envoyer</button>
    </form>

    <div id="trait2"></div>
    <div id="copyrightIcon">
      <div id="copyright">
        <span>© Alix Santa; 2022</span>
      </div>
      <div id="icons">
        <a href="https://www.instagram.com/kfc.es/?hl=fr"><img src="./assets/medias/instagram.png"></a>
        <a href="https://twitter.com/KFC_ES"><img src="./assets/medias/twitter.png"></a>
        <a href="https://twitter.com/KFC_ES"><img src="./assets/medias/facebook.png"></a>
        </div>
        <span><a href="./views/viewsMentions">Mentions légales</a></span>
    </div>
  </footer>
</body>
</html>