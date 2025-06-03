<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Mises à jour Minecraft</title>
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
            <a href="creatures.php">Mob</a>
            <a href="#tutoriels">Tutoriels</a>
        </nav>
    </header>
    <main>
    <h1>Historique des principales mises à jour de Minecraft</h1>

    <?php
    $maj_list = [
        ["version" => "1.21", "nom" => "Trial Chambers Update", "date" => "Juin 2025", "description" => "Chambres d’épreuves, Breeze, crafter automatisé, nouveaux blocs."],
        ["version" => "1.20", "nom" => "Trails & Tales", "date" => "Juin 2023", "description" => "Chameaux, archéologie, panneaux suspendus, bambou sculpté."],
        ["version" => "1.19", "nom" => "The Wild Update", "date" => "Juin 2022", "description" => "Ajout du Warden, Deep Dark, allays, grenouilles, mangrove."],
        ["version" => "1.18", "nom" => "Caves & Cliffs Part II", "date" => "Novembre 2021", "description" => "Nouveau système de génération des grottes et montagnes."],
        ["version" => "1.17", "nom" => "Caves & Cliffs Part I", "date" => "Juin 2021", "description" => "Ajout des axolotls, chèvres, minerais brillants."],
        ["version" => "1.16", "nom" => "Nether Update", "date" => "Juin 2020", "description" => "Refonte du Nether, piglins, bastions, netherite."],
        ["version" => "1.15", "nom" => "Buzzy Bees", "date" => "Décembre 2019", "description" => "Ajout des abeilles, ruches, miel et blocs associés."],
        ["version" => "1.14", "nom" => "Village & Pillage", "date" => "Avril 2019", "description" => "Nouveaux villages, raids, métiers, pandas, feu de camp."],
        ["version" => "1.13", "nom" => "Update Aquatic", "date" => "Juillet 2018", "description" => "Refonte des océans, dauphins, noyés, coraux, algues."],
        ["version" => "1.12", "nom" => "World of Color Update", "date" => "Juin 2017", "description" => "Nouveaux blocs colorés, recettes, perroquets, fonctions."],
        ["version" => "1.11", "nom" => "Exploration Update", "date" => "Novembre 2016", "description" => "Ajout des manoirs, shulkers, cartographes, llamas."],
        ["version" => "1.10", "nom" => "Frostburn Update", "date" => "Juin 2016", "description" => "Ajout de blocs de magma, ours polaires, et fossiles."],
        ["version" => "1.9", "nom" => "Combat Update", "date" => "Février 2016", "description" => "Refonte du système de combat, boucliers, et Elytras."],
        ["version" => "1.8", "nom" => "Bountiful Update", "date" => "Septembre 2014", "description" => "Ajout des gardiens, temples sous-marins, lapins, commandes JSON."],
        ["version" => "1.7", "nom" => "The Update that Changed the World", "date" => "Octobre 2013", "description" => "Refonte des biomes, ajout de blocs colorés et des fleurs."],
        ["version" => "1.6", "nom" => "Horse Update", "date" => "Juillet 2013", "description" => "Ajout des chevaux, ânes, tapis, blocs de charbon."],
        ["version" => "1.5", "nom" => "Redstone Update", "date" => "Mars 2013", "description" => "Ajout de nouveaux blocs redstone comme le comparateur et le hopper."],
        ["version" => "1.4", "nom" => "Pretty Scary Update", "date" => "Octobre 2012", "description" => "Ajout du Wither, des têtes, des cadres, des commandes."],
        ["version" => "1.3", "nom" => "", "date" => "Août 2012", "description" => "Fusion du solo/multijoueur, ajout des émeraudes, commerce avec villageois."],
        ["version" => "1.2", "nom" => "", "date" => "Mars 2012", "description" => "Ajout des biomes jungle, ocelots, golems de fer, et escaliers orientables."],
        ["version" => "1.1", "nom" => "", "date" => "Janvier 2012", "description" => "Ajout de nouvelles langues, des œufs de spawn, et des améliorations diverses."],
        ["version" => "1.0", "nom" => "Release", "date" => "Novembre 2011", "description" => "Ajout de l'End, du dragon de l'Ender, potions et enchantements."]
    ];

    foreach ($maj_list as $maj) {
        echo "<div class='maj'>";
        echo "<h2>Minecraft {$maj['version']} – {$maj['nom']}</h2>";
        echo "<p><strong>Date de sortie :</strong> {$maj['date']}</p>";
        echo "<p>{$maj['description']}</p>";
        echo "</div>";
    }
    ?>
    <a href="#" class="top-link">Retour en haut</a>
    </main>
</body>
<script src="script.js"></script>
</html>
