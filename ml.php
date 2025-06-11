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
        <h2>Mentions légales</h2>
        <p>Éditeur du site</p>
        <p>Ce site est un wiki communautaire dédié au jeu Minecraft. Il est édité à titre non lucratif.</p>

        <p>Nom du responsable : Killian</p>

        <p>Adresse e-mail : killian.prat35@gmail.com</p>

        <p>Hébergeur : Page Github</p>
        <p>Adresse : https://github.com/Parzaval35/Projet-Wiki-minecraft/</p>
        <p>Site : https://github.com/</p>

        <p>Objet du site</p>
        <p>Ce site a pour but de fournir un espace d'information, de partage et de documentation autour du jeu Minecraft, sous forme de wiki.</p>

        <p>Propriété intellectuelle</p>
        <p>Minecraft est une marque de Mojang Studios. Ce site n’est ni affilié, ni sponsorisé, ni approuvé par Mojang ou Microsoft.</p>

        <p>Le contenu du wiki est sous licence CC-BY-SA, sauf indication contraire.</p>

        <p>Responsabilité</p>
        <p>Les contributeurs sont responsables du contenu qu’ils publient. L’éditeur s’engage à retirer tout contenu illicite dès qu’il en est informé.</p>
    </main>
    <script src="script.js"></script>
</body>
</html>