<?php
session_start();
require 'config.php';
$isConnected = isset($_SESSION["utilisateur_id"]);
$id_page = isset($_GET["id_page"]) ? intval($_GET["id_page"]) : 2;
$isAdmin = isset($_SESSION["role"]) && $_SESSION["role"] === "admin";

// Traitement de la suppression commentaire
if ($isConnected && $isAdmin && isset($_GET['supprimer'])) {
    $id_supp = intval($_GET['supprimer']);
    $pdo->prepare("DELETE FROM commentaires WHERE id_parent = ?")->execute([$id_supp]);
    $pdo->prepare("DELETE FROM commentaires WHERE id_commentaire = ?")->execute([$id_supp]);
    header("Location: " . $_SERVER['PHP_SELF'] . "?id_page=$id_page#commentaires");
    exit();
}

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
            <a href="creatures.php">Mob</a>
            <a href="menu_tuto.php">Tutoriels</a>
     </nav>
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
      <img src="images/stone.png" alt="Pierre" class="block-img">
      <ul>
        <li><strong>Obtention :</strong> En minant avec une pioche, donne de la cobblestone.</li>
        <li><strong>Utilisation :</strong> Construction, craft de four, outils en pierre.</li>
        <li><strong>Résistance :</strong> Moyenne</li>
      </ul>
    </article>

    <article class="mob">
      <h3>Terre</h3>
      <img src="images/dirt.webp" alt="Terre" class="block-img">
      <ul>
        <li><strong>Obtention :</strong> À la pelle, omniprésente dans les plaines et forêts.</li>
        <li><strong>Utilisation :</strong> Plantation, remplissage de trous.</li>
        <li><strong>Résistance :</strong> Faible</li>
      </ul>
    </article>

<article class="mob">
  <h3>Bois</h3>
  <img src="images/bois.png" alt="Bois" class="block-img">
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
      <img src="images/fer.webp" alt="Minerai de fer" class="block-img">
      <ul>
        <li><strong>Obtention :</strong> Miné avec une pioche en pierre ou supérieure.</li>
        <li><strong>Utilisation :</strong> Fonte pour obtenir du fer utilisable en crafting.</li>
        <li><strong>Résistance :</strong> Moyenne.</li>
      </ul>
    </article>

    <article class="mob">
      <h3>Diamant</h3>
      <img src="images/diamant.png" alt="Minerai de diamant" class="block-img">
      <ul>
        <li><strong>Obtention :</strong> Miné avec une pioche en fer ou supérieure.</li>
        <li><strong>Utilisation :</strong> Fabrication des outils et armures les plus résistants.</li>
        <li><strong>Résistance :</strong> Bonne.</li>
      </ul>
    </article>

    <article class="mob">
      <h3>Or</h3>
      <img src="images/or.webp" alt="Minerai d’or" class="block-img">
      <ul>
        <li><strong>Obtention :</strong> Miné avec une pioche en fer ou supérieure.</li>
        <li><strong>Utilisation :</strong> Fonte pour obtenir de l’or, utilisé en objets décoratifs et redstone.</li>
        <li><strong>Résistance :</strong> Moyenne.</li>
      </ul>
    </article>

    <article class="mob">
      <h3>Charbon</h3>
      <img src="images/charbon.png" alt="Minerai de charbon" class="block-img">
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
      <h3>Table de Craft</h3>
      <img src="images/crafting_table.webp" alt="crafting_table" class="block-img">
      <ul>
        <li><strong>Obtention :</strong> Se craft avec 4 planches.</li>
        <li><strong>Utilisation :</strong> Permet de crafter des items et des blocs.</li>
        <li><strong>Interface :</strong> Possède une UI pour gérer une grille de crafting en 3x3.</li>
      </ul>
    </article>

    <article class="mob">
      <h3>Four</h3>
      <img src="images/furnace.png" alt="Four" class="block-img">
      <ul>
        <li><strong>Obtention :</strong> Craft avec de la cobblestone.</li>
        <li><strong>Utilisation :</strong> Faire cuire aliments, minerais.</li>
        <li><strong>Interface :</strong> Possède une UI pour gérer le combustible et les objets.</li>
      </ul>
    </article>

    <article class="mob">
      <h3>Coffre</h3>
      <img src="images/chest.webp" alt="Coffre" class="block-img">
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
  <div class="comment-scroll">
    <ul>
    <?php foreach ($commentaires as $commentaire): ?>
        <?php if ($commentaire["id_parent"] === null): ?>
            <li>
                <strong>Commentaire de <?= $commentaire["pseudo"] ?> : </strong><br><?= $commentaire["contenu"] ?><br>

                <?php foreach ($commentaires as $reponse): ?>
                    <?php if ($reponse["id_parent"] == $commentaire["id_commentaire"]): ?>
                        <div style="margin-left:30px;">
                            <strong>Réponse de <?= $reponse["pseudo"] ?> : </strong><br><?= $reponse["contenu"] ?><br>
                            <?php if ($isAdmin): ?>
                                <form method="get" style="display:inline;">
                                    <input type="hidden" name="supprimer" value="<?= $reponse["id_commentaire"] ?>">
                                    <input type="hidden" name="id_page" value="<?= $id_page ?>">
                                    <button type="submit" class="supprimer-reponse-btn">Supprimer</button>
                                </form>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>

                <a href="?repondre=<?= $commentaire['id_commentaire'] ?>&id_page=<?= $id_page ?>#commentaires" class="reponse-btn">Répondre</a>

                <?php if ($isAdmin): ?>
                    <form method="get" style="display:inline;">
                        <input type="hidden" name="supprimer" value="<?= $commentaire["id_commentaire"] ?>">
                        <input type="hidden" name="id_page" value="<?= $id_page ?>">
                        <button type="submit" class="supprimer-commentaire-btn">Supprimer</button>
                    </form>
                <?php endif; ?>

                <?php if (isset($_GET["repondre"]) && $_GET["repondre"] == $commentaire['id_commentaire']): ?>
                    <?php if ($isConnected): ?>
                        <form method="post">
                            <input type="hidden" name="id_parent" value="<?= $commentaire['id_commentaire'] ?>">
                            <div class="form-buttons">
                                <textarea name="commentaire" required></textarea><br>
                                <button type="submit" class="publier-btn">Publier la réponse</button>
                            </div>
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
  </div>

  <!-- Ajouter un commentaire principal -->
  <a href="?ajouter=1&id_page=<?= $id_page ?>#commentaires" class="comment-btn">Ajouter un commentaire</a>

  <?php if (isset($_GET["ajouter"])): ?>
      <?php if ($isConnected): ?>
          <form method="post">
              <input type="hidden" name="id_parent" value="">
              <input type="hidden" name="id_page" value="<?= $id_page ?>">
              <div class="form-buttons">
                  <textarea name="commentaire" required></textarea><br>
                  <button type="submit" class="publier-btn">Publier le commentaire</button>
              </div>
          </form>
      <?php else: ?>
          <p style="color:red;">Vous ne pouvez pas ajouter de commentaire, connectez-vous ou inscrivez-vous.</p>
      <?php endif; ?>
  <?php endif; ?>
</section>
    <a href="" class="top-link">Retour en haut</a>
    </main>
    <footer>
        <a href="pc.php">Politique de confidentialité</a> |
        <a href="pc.php">Mentions légales</a>
    </footer>
</body>
<script src="script.js"></script>
</html>
