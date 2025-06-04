<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=blocnote', 'root', '');
$isConnected = isset($_SESSION["utilisateur_id"]);
$id_page = isset($_GET["id_page"]) ? intval($_GET["id_page"]) : 2;

// Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["commentaire"])) {
    $contenu = $_POST["commentaire"];
    $id_parent = !empty($_POST["id_parent"]) ? intval($_POST["id_parent"]) : null;
    $stmt = $pdo->prepare("INSERT INTO commentaires (id_utilisateur, contenu, id_parent,id_page) VALUES (?, ?, ?,?)");
    $stmt->execute([$_SESSION["utilisateur_id"], $contenu, $id_parent,$id_page]);

    header("Location: " . $_SERVER['PHP_SELF'] . "?id_page=$id_page");
    exit();
}

// Récupération des commentaires
$sql = "SELECT commentaires.*, utilisateurs.pseudo FROM commentaires 
        JOIN utilisateurs ON commentaires.id_utilisateur = utilisateurs.id WHERE commentaires.id_page =2
        ORDER BY commentaires.id_commentaire ASC";
$stmt = $pdo->query($sql);
$commentaires = $stmt->fetchAll();
?>

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
  <header>
     <div class="logo"><img src="images/logo.png" alt="Block-Note Logo" style="height: 80px;" id="logo" /></div>
     <nav>
            <a href="index.php">Home</a>
            <a href="Maj.php">Dernières MàJ</a>
            <a href="blocs.php">Block</a>
            <a href="Creatures.html">Mob</a>
            <a href="menu_tuto.php">Tutoriels</a>
     </nav>
     <style>

    .mob {
       background-color: rgba(255, 255, 255, 0.274);
        border-radius: 16px;
       padding: 16px;
       margin: 20px;
       box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
       text-align: justify;
       transition: background 0.3s;
       display: flex;
  	flex-wrap: wrap;
    }

    
    .mob-img {
      display: block;
      margin: 0 auto 12px auto;
      border-radius: 8px;
      max-width: 300px;
      height: auto;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4); /* ombre image */
    }   

    
  .item-icon {
      width: 24px;
      height: 24px;
      vertical-align: middle;
      margin-right: 4px;
    }
    .cœur {
      width: 24px;
      height: 24px;
    }
    </style>
  </header>

  <main>
    <section class="intro">
  <h1>Les Blocs</h1>
  <p>Les blocs sont les éléments de base dans Minecraft. Que tu construises une maison, une machine redstone ou une œuvre d'art, chaque bloc a son utilité. Voici un aperçu des types de blocs que tu peux rencontrer.</p>
</section>

<button class="accordion-btn">🪨 Blocs Naturels</button>
<div class="category-panel">
  <div class="category">

    <p>Ce sont les blocs que tu trouves directement dans la nature : pierre, terre, sable, etc.</p>

    <article class="mob">
      <h3>Pierre</h3>
      <img src="images/stone.png" alt="Pierre" class="mob-img">
      <ul>
        <li><strong>Obtention :</strong> En minant avec une pioche, donne de la cobblestone.</li>
        <li><strong>Utilisation :</strong> Construction, craft de four, outils en pierre.</li>
        <li><strong>Résistance :</strong> Moyenne</li>
      </ul>
    </article>

    <article class="mob">
      <h3>Terre</h3>
      <img src="images/dirt.webp" alt="Terre" class="mob-img">
      <ul>
        <li><strong>Obtention :</strong> À la pelle, omniprésente dans les plaines et forêts.</li>
        <li><strong>Utilisation :</strong> Plantation, remplissage de trous.</li>
        <li><strong>Résistance :</strong> Faible</li>
      </ul>
    </article>

<article class="mob">
  <h3>Bois</h3>
  <img src="images/bois.png" alt="Bois" class="mob-img">
  <ul>
    <li><strong>Obtention :</strong> Coupé sur les arbres.</li>
    <li><strong>Utilisation :</strong> Construction, crafting de planches et outils.</li>
    <li><strong>Résistance :</strong> Moyenne, inflammable.</li>
  </ul>
</article>
  </div>
</div>

<button class="accordion-btn">⛏️ Minerais</button>
<div class="category-panel">
  <div class="category">
    <p>Ces blocs contiennent des ressources précieuses que tu peux miner pour fabriquer outils, armures, et plus.</p>

    <article class="mob">
      <h3>Fer</h3>
      <img src="images/fer.webp" alt="Minerai de fer" class="mob-img">
      <ul>
        <li><strong>Obtention :</strong> Miné avec une pioche en pierre ou supérieure.</li>
        <li><strong>Utilisation :</strong> Fonte pour obtenir du fer utilisable en crafting.</li>
        <li><strong>Résistance :</strong> Moyenne.</li>
      </ul>
    </article>

    <article class="mob">
      <h3>Diamant</h3>
      <img src="images/diamant.png" alt="Minerai de diamant" class="mob-img">
      <ul>
        <li><strong>Obtention :</strong> Miné avec une pioche en fer ou supérieure.</li>
        <li><strong>Utilisation :</strong> Fabrication des outils et armures les plus résistants.</li>
        <li><strong>Résistance :</strong> Bonne.</li>
      </ul>
    </article>

    <article class="mob">
      <h3>Or</h3>
      <img src="images/or.webp" alt="Minerai d’or" class="mob-img">
      <ul>
        <li><strong>Obtention :</strong> Miné avec une pioche en fer ou supérieure.</li>
        <li><strong>Utilisation :</strong> Fonte pour obtenir de l’or, utilisé en objets décoratifs et redstone.</li>
        <li><strong>Résistance :</strong> Moyenne.</li>
      </ul>
    </article>

    <article class="mob">
      <h3>Charbon</h3>
      <img src="images/charbon.png" alt="Minerai de charbon" class="mob-img">
      <ul>
        <li><strong>Obtention :</strong> Miné avec n’importe quelle pioche.</li>
        <li><strong>Utilisation :</strong> Combustible pour fours, crafting de torches.</li>
        <li><strong>Résistance :</strong> Faible.</li>
      </ul>
    </article>
  </div>
</div>

<button class="accordion-btn">⚙️ Blocs Utilitaires</button>
<div class="category-panel">
  <div class="category">
    <p>Ces blocs servent à des actions spécifiques : cuisson, stockage, craft, etc.</p>

    <article class="mob">
      <h3>Four</h3>
      <img src="images/furnace.png" alt="Four" class="mob-img">
      <ul>
        <li><strong>Obtention :</strong> Craft avec de la cobblestone.</li>
        <li><strong>Utilisation :</strong> Faire cuire aliments, minerais.</li>
        <li><strong>Interface :</strong> Possède une UI pour gérer le combustible et les objets.</li>
      </ul>
    </article>

    <article class="mob">
      <h3>Coffre</h3>
      <img src="images/chest.webp" alt="Coffre" class="mob-img">
      <ul>
        <li><strong>Utilité :</strong> Stocker jusqu'à 27 objets.</li>
        <li><strong>Double Coffre :</strong> Deux coffres côte à côte forment un grand coffre.</li>
        <li><strong>Redstone :</strong> Peut être utilisé dans des systèmes automatisés.</li>
      </ul>
    </article>
  </div>
</div>
<section class="comment-section" id="commentaires">
  <h2>Commentaires</h2>
<ul>
<?php foreach ($commentaires as $commentaire): ?>
    <?php if ($commentaire["id_parent"] === null): ?>
        <li>
            <strong>Commentaire de <?= $commentaire["pseudo"] ?> : </strong><br><?= $commentaire["contenu"] ?>
            <br>
            <!-- Affichage des réponses -->
            <?php foreach ($commentaires as $reponse): ?>
                <?php if ($reponse["id_parent"] == $commentaire["id_commentaire"]): ?>
                    <div style="margin-left:30px;">
                        Réponse de <?= $reponse["pseudo"] ?> : <br><?= $reponse["contenu"] ?>
			<br>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>

            <!-- Lien Répondre -->
            <a href="?repondre=<?= $commentaire['id_commentaire'] ?>&id_page=<?= $id_page ?>#commentaires">Répondre</a>

            <!-- Formulaire réponse -->
            <?php if (isset($_GET["repondre"]) && $_GET["repondre"] == $commentaire['id_commentaire']): ?>
                <?php if ($isConnected): ?>
                    <form method="post">
                        <input type="hidden" name="id_parent" value="<?= $commentaire['id_commentaire'] ?>">
                        <textarea name="commentaire" required></textarea><br>
                        <button type="submit">Publier la réponse</button>
                    </form>
                <?php else: ?>
                    <p style="color:red;">Vous ne pouvez pas répondre au commentaire, connectez-vous ou inscrivez-vous.</p>
                <?php endif; ?>
            <?php endif; ?>

        </li>
        <br>
    <?php endif; ?>
<?php endforeach; ?>
</ul>


<!-- Ajouter un commentaire principal -->
<a href="?ajouter=1&id_page=<?= $id_page ?>#commentaires">Ajouter un commentaire</a>

<?php if (isset($_GET["ajouter"])): ?>
    <?php if ($isConnected): ?>
        <form method="post">
            <input type="hidden" name="id_parent" value="">
	    <input type="hidden" name="id_page" value="2">
            <textarea name="commentaire" required></textarea><br>
            <button type="submit">Publier le commentaire</button>
        </form>
    <?php else: ?>
        <p style="color:red;">Vous ne pouvez pas ajouter de commentaire, connectez-vous ou inscrivez-vous.</p>
    <?php endif; ?>
<?php endif; ?>

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
