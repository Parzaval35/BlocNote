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
    <header>
        <div class="logo"><img src="logo.png" alt="Block-Note Logo" style="height: 80px;"/></div>
        <nav>
            <a href="#populaires">Populaires</a>
            <a href="#dernieres-maj">Dernières MàJ</a>
            <a href="#block">Block</a>
            <a href="#mob">Mob</a>
            <a href="#tutoriels">Tutoriels</a>
            <a href="#mods-populaires">Mods Populaires</a>
            <a href="#modpacks">Modpacks</a>
        </nav>
    </header>
    <main>
        <section id="presentation">
            <h2>Présentation du jeu</h2>
            <p>Bienvenue sur le wiki du jeu. Découvrez tout ce qu'il faut savoir pour bien commencer et progresser.</p>
        </section>
        <section id="trivia">
            <h2>Trivia</h2>
            <p>Quelques anecdotes et faits intéressants sur le jeu.</p>
        </section>
        <section id="dernieres-maj">
            <h2>Dernière MàJ / Actualités</h2>
            <p>Les dernières mises à jour et actualités du jeu seront affichées ici.</p>
        </section>
        <a href="#" class="top-link">Retour en haut</a>
    </main>
    <footer>
        <a href="#politique-confidentialite">Politique de confidentialité</a> |
        <a href="#mentions-legales">Mentions légales</a>
    </footer>
    <script src="script.js"></script>
</body>
</html>
