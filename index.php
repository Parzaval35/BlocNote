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
        <?php
	session_start(); 

	if (isset($_SESSION["pseudo"])) {
    		echo '<button class="connexion-btn" onclick="window.location.href=\'deconnexion.php\'">Déconnexion</button>';
	} else {
    		echo '<button class="connexion-btn" onclick="window.location.href=\'connexion.php\'">Connexion</button>';
    		echo '<button class="inscription-btn" onclick="window.location.href=\'inscription.php\'">Inscription</button>';
	}
	?>
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
            <a href="creatures.php">Mob</a>
            <a href="menu_tuto.php">Tutoriels</a>
        </nav>
    </header>
    <main>
        <?php
	        if (isset($_SESSION["pseudo"])) {
		        echo"<h2>Bienvenue, " . $_SESSION["pseudo"]. "</h2>";}
	    ?>

        <section id="presentation">
            <h2>Présentation du jeu</h2>
            <p>Minecraft est un jeu vidéo bac à sable développé par Mojang Studios, qui permet aux joueurs d'explorer, construire et survivre dans un monde généré de manière procédurale composé de blocs. Que vous soyez un aventurier en quête de ressources, un architecte passionné ou un explorateur curieux, Minecraft vous offre une liberté totale pour créer votre propre expérience de jeu.</p>
            <p>Dans ce wiki, vous trouverez toutes les informations essentielles pour bien débuter, maîtriser les mécaniques du jeu, et découvrir les secrets cachés de son univers. Préparez-vous à miner, crafter et survivre dans un monde sans limites !</p>
        </section>
       <section id="trivia">
            <h2>Trivia</h2>
            <p>Minecraft regorge d’anecdotes fascinantes et de petits détails amusants qui ont marqué son histoire et sa communauté. Saviez-vous que :</p>
            <ul>
                <li>Le tout premier nom de Minecraft était <strong>"Cave Game"</strong> ?</li>
                <li>Le langage écrit des enchantements est basé sur l’alphabet Standard Galactique utilisé dans les jeux Commander Keen ?</li>
                <li>Les Creepers, ces monstres emblématiques, sont en fait nés d’un bug de modélisation d’un cochon ?</li>
                <li>Markus Persson, alias Notch, a développé la première version jouable du jeu en seulement quelques jours en mai 2009.</li>
                <li>Le disque de musique "11" est l’un des mystères les plus discutés par les fans à cause de son ambiance inquiétante.</li>
            </ul>
            <p>Ce ne sont là que quelques exemples parmi tant d’autres. Minecraft ne cesse de surprendre, même après des années d’existence !</p>
        </section>

        <section id="dernieres-maj">
            <h2>Dernière MàJ / Actualités</h2>
            <article>
                <h3>Minecraft 1.21 – Update "Trial Chambers"</h3>
                <p><strong>Date :</strong> Juin 2025</p>
                <p>La mise à jour 1.21 introduit les chambres d’épreuves, un tout nouveau type de structure remplie de pièges, d'ennemis et de récompenses rares ! Elle ajoute également de nouveaux blocs décoratifs, le crafter automatisé, et le mob Breeze, un nouvel adversaire à affronter dans les souterrains.</p>
            </article>
            <article>
                <h3>Événement : Minecraft Live 2025</h3>
                <p><strong>Date :</strong> À venir en octobre 2025</p>
                <p>Le prochain Minecraft Live a été annoncé ! De nouvelles annonces sur le contenu futur, un vote de la communauté pour un nouveau mob, et bien d’autres surprises seront au rendez-vous. Restez connectés !</p>
            </article>
        </section>

        <a href="" class="top-link">Retour en haut</a>
    </main>
    <footer>
        <a href="#politique-confidentialite">Politique de confidentialité</a> |
        <a href="#mentions-legales">Mentions légales</a>
    </footer>
    <script src="script.js"></script>
</body>
</html>
