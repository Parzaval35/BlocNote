<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Menu des Tutoriels</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="fixed-menu">
        <button class="connexion-btn" onclick="window.location.href='connexion.php'">Connexion</button>
        <button class="inscription-btn" onclick="window.location.href='inscription.php'">Inscription</button>
        <label class="switch">
            <input type="checkbox" id="nightModeCheckbox">
            <span></span>
        </label>
    </div>
    <header>
        <div class="logo"><img id="logo" src="images/logo.png" alt="Block-Note Logo" style="height: 80px;"/></div>
        <nav>
            <a href="index.php">Home</a>
            <a href="Maj.php">Dernières MàJ</a>
            <a href="blocs.php">Block</a>
            <a href="Creatures.html">Mob</a>
            <a href="menu_tuto.php">Tutoriels</a>
        </nav>
    </header>
    <main>
        <h1>Liste de tout les Tutoriels</h1>
        <ul class="tutorial-list">
            <li><a href="Tuto-finir.php">Tuto finir Minecraft</a></li>
            <li><a href="tuto_redstone.php">Tuto Redstone</a></li>
            <li><a href="tuto_construction.php">Tuto Construction</a></li>
            <li><a href="tuto_survie.php">Tuto Survie</a></li>
            <li><a href="tuto_exploration.php">Tuto Exploration</a></li>
        </ul>
    </main>
    <footer>
        <a href="#politique-confidentialite">Politique de confidentialité</a> |
        <a href="#mentions-legales">Mentions légales</a>
    </footer>
    <script src="script.js"></script>
</body>
</html>
