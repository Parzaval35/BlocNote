
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
  <header class="tuto-section">
     <div class="logo"><img src="images/logo.png" alt="Block-Note Logo" style="height: 80px;" id="logo" /></div>
     <nav>
            <a href="index.php">Home</a>
            <a href="Maj.php">Dernières MàJ</a>
            <a href="blocs.php">Block</a>
            <a href="Creatures.php">Mob</a>
            <a href="menu_tuto.php">Tutoriels</a>
     </nav>
     <style>
    html {
      scroll-snap-type : y mandatory;
      scroll-behavior: smooth;
    }
    </style>
  </header>
<body>

  <div class="tuto-section">
  <h1 style="text-align: center; margin: 10px">🛠️ Tutoriels pour finir Minecraft</h1>
  </div>

  <div class="tuto-section">
    <h2>🌳1. Bien commencer</h2>
     <img src="images/mining_wood.gif" alt="Wood" class="img">
    <p>Tu viens de spawn ? Commence par taper du bois <img src="images/oak_log.webp" class="item-icon"> pour faire une pioche en bois <img src="images/wooden_pickaxe.png" class="item-icon">. Direct après, va chercher de la pierre <img src="images/cobblestone.webp" class="item-icon"> et fabrique tous les outils de base : pioche <img src="images/stone_pickaxe.png" class="item-icon">, épée<img src="images/stone_sword.png" class="item-icon">, hache <img src="images/stone_axe.png" class="item-icon">. Ensuite, cherche un <strong>village</strong> <img src="images/village.webp" class="item-icon"> : tu y trouveras de la <strong>nourriture</strong> <img src="images/bread.png" class="item-icon">, un <strong>lit</strong> <img src="images/bed.webp" class="item-icon">, et parfois même de l'<strong>équipement</strong> <img src="images/iron_chestplate.png" class="item-icon">. C’est ta base de départ idéale pour survivre.</p>
  </div>

  <div class="tuto-section">
    <h2>💎2. L'âge du diamant</h2>
    <img src="images/Enchanting_table.webp" alt="Diamond" class="img">
    <p>Une fois bien installé, pars miner jusqu’à la couche -59 pour chercher du <strong>diamant</strong> <img src="images/diamond.png" class="item-icon">. Fais-toi une <strong>pioche en diamant</strong> <img src="images/diamond_pickaxe.png" class="item-icon">, récupère de l’<strong>obsidienne</strong> <img src="images/obsidian.webp" class="item-icon"> et fabrique une <strong>table d’enchantement</strong> <img src="images/Enchanting_Table.gif" class="item-icon">. Enchante ton stuff petit à petit : Protection, Solidité, Tranchant... ça va changer ta vie.</p>
  </div>

  <div class="tuto-section">
    <h2>🔥3. Le Nether</h2>
    <img src="images/nether_portal.gif" alt="Nether" class="img">
    <p>Avec l'obsidienne récolté, construis un <strong>portail du Nether</strong> avec ton briquet <img src="images/flint_and_steel.png" class="item-icon"> allume un flamme dedans pour l'ouvrir. Là-bas, ton but est de trouver une <strong>forteresse</strong> pour récupérer des <strong>bâtons de Blaze</strong> <img src="images/blaze_rod.png" class="item-icon">. Il te faut aussi des <strong>perles de l’End</strong> <img src="images/ender_pearl.png" class="item-icon"> que tu peux obtenir en tuant des <strong>Endermen</strong> ou en échangeant avec des <strong>Piglins</strong> (jette-leur de l’or <img src="images/gold_ingot.png" class="item-icon"> ).</p>
  </div>

  <div class="tuto-section">
    <h2>🐉4. L'End et la fin</h2>
    <img src="images/ender_portal.gif" alt="End" class="img">
    <p>Transforme les Blaze rods en <strong>poudre de Blaze</strong> <img src="images/blaze_powder.png" class="item-icon"> et fusionne-les avec des <strong>perles</strong> pour obtenir des <strong>yeux de l’Ender</strong> <img src="images/ender_eye.png" class="item-icon">. Utilise-les pour trouver un <strong>Stronghold</strong> et activer le <strong>portail de l’End</strong>. Dans l’End, détruis les <strong>cristaux</strong> <img src="images/ender_crystal.webp" class="item-icon"> sur les piliers, puis bats le <strong>Dragon de l’End</strong> <img src="images/DragonHead.webp" class="item-icon">. Une fois vaincu, tu pourras accéder à une ville de l’End pour trouver des <strong>Élytras</strong> <img src="images/elytra.png" class="item-icon"> (ailes planantes). Félicitations, t’as fini Minecraft ! 🎉</p>
  </div>

</body>

  </main>

    <footer>
      <a href="pc.php">Politique de confidentialité</a> |
      <a href="ml.php">Mentions légales</a>
  </footer>
  <script src="script.js"></script>
  
</body>
</html>
