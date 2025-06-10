
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Block-Note wiki</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <div class="fixed-menu">
    <button class="connexion-btn" href="connexion.php">Connexion</button>
    <button class="inscription-btn" href="inscription.php">Inscription</button>
    <label class="switch">
        <input type="checkbox" id="nightModeCheckbox">
        <span></span>
    </label>
  </div>
  <header class="tuto-section">
     <div class="logo"><img src="images/logo.png" alt="Block-Note Logo" style="height: 80px;" id="logo" /></div>
     <nav>
            <a href="index.php">Home</a>
            <a href="Maj.php">Dernières MàJ</a>
            <a href="blocs.php">Block</a>
            <a href="Creatures.html">Mob</a>
            <a href="menu_tuto.php">Tutoriels</a>
     </nav>
     <style>

    html {
      scroll-snap-type : y mandatory;
      scroll-behavior: smooth;
    }
    
    .img {
      display: block;
      margin: 0 auto 12px auto;
      border-radius: 8px;
      min-width: 500px;
      max-width: 500px;
      height: auto;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4); /* ombre image */
    }   

  .item-icon {
      width: 24px;
      height: 24px;
      vertical-align: middle;
      margin-right: 4px;
    }

    </style>
  </header>
<body>

  <div class="tuto-section">
  <h1 style="text-align: center; margin-bottom: 40px;">🚪 Tutoriels Redstone : La porte de Jeb</h1>
  <h3> Suis ce tutoriel pour créer une porte secrète totalement indétectable !</h3>
  </div>

  <div class="tuto-section">
    <h2>Etape 1</h2>
     <img src="images/jebdoor_1.png" alt="1" class="img">
    <p>Commence à poser 2 carré de 2x2 pistons collants les un en face des autres avec 4 blocs d'écart.</p>
  </div>

  <div class="tuto-section">
    <h2>Etape 2</h2>
    <img src="images/jebdoor_2.png" alt="2" class="img">
    <p>Ensuite à l'intérieur de cet espace, rajoute 2 pistons collants l'un sur l'autre, collés aux aux autres. Ces pistons sont orientés vers nous, l'entrée. Fais le de chaque côté. Ensuite rajoute des blocs devant ces nouveaux pistons.</p>
  </div>

  <div class="tuto-section">
    <h2>Etape 3</h2>
    <img src="images/jebdoor_3.png" alt="3" class="img">
    <p> Rajoute des blocs au-dessus des pistons et fais un pont au-dessus du passage, ça servira en mettre la redstone.</p>
  </div>

  <div class="tuto-section">
    <h2>Etape 4</h2>
    <img src="images/jebdoor_4.png" alt="4" class="img">
    <p>Mets de la redstone sur ces nouveaux blocs, avec des reapeters orientés vers l'extérieur, définis les à 1 tick sinon ça ne marchera pas. Regarde juste en dessous c'est comme ça qu'ils doivent être.</p>
    <img src="images/jebdoor_5.png" alt="5" class="img">
  </div>

  <div class="tuto-section">
    <h2>Etape 5</h2>
    <img src="images/jebdoor_6.gif" alt="6" class="img">
    <p>Rajoute un levier pour activer la redstonne du milieu, et admire le résusltat. Voilà maintenant tu as une porte totalement indétectable pour tes bases secrètes.</p>
  </div>

</body>

  </main>

    <footer>
      <a href="#politique-confidentialite">Politique de confidentialité</a> |
      <a href="#mentions-legales">Mentions légales</a>
  </footer>
  <script src="script.js"></script>
  <script>
    AOS.init();
  </script>
  
</body>
</html>
