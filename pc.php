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
        <h2>Politique de confidentialité</h2>
        <p>Dernière mise à jour : 11/06/2025</p>

<p>Nous nous engageons à respecter votre vie privée et à protéger les informations personnelles que vous pourriez être amené à fournir sur notre site.</p>

<p>1. Collecte des données
Ce site ne collecte pas de données personnelles à moins que vous ne décidiez de créer un compte ou de participer au wiki. Dans ce cas, les données suivantes peuvent être enregistrées :

Pseudonyme ou nom d’utilisateur

Adresse e-mail (si fournie volontairement)

Adresse IP (automatiquement enregistrée à des fins de sécurité et de modération)</p>

<p>2. Utilisation des données
Les données collectées sont utilisées uniquement dans les buts suivants :

Permettre la participation au wiki (édition, discussion, etc.)

Garantir la sécurité du site (modération, prévention des abus)

Améliorer les performances et la stabilité du site

Nous ne revendons, ne louons ni ne partageons vos données avec des tiers.</p>

<p>3. Cookies
Le site peut utiliser des cookies techniques pour :

Gérer les sessions de connexion

Se souvenir de vos préférences de navigation

Vous pouvez configurer votre navigateur pour refuser les cookies. Cela peut cependant limiter certaines fonctionnalités du site.</p>

<p>4. Sécurité
Nous mettons en œuvre des mesures techniques pour protéger vos données contre tout accès non autorisé. Cependant, aucune méthode de transmission ou de stockage électronique n’est sécurisée à 100 %.</p>

<p>5. Vos droits
Conformément au RGPD (si vous êtes en Europe), vous disposez de droits sur vos données :

Droit d'accès

Droit de rectification

Droit à l'effacement

Droit d'opposition

Pour exercer ces droits, vous pouvez nous contacter à : blocnote@minecraft.net</p>
<script src="script.js"></script>
</body>
</html>