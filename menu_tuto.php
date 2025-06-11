<?php
session_start();
require 'config.php';
$isConnected = isset($_SESSION["utilisateur_id"]);
$id_page = isset($_GET["id_page"]) ? intval($_GET["id_page"]) : 4;
$isAdmin = isset($_SESSION["role"]) && $_SESSION["role"] === "admin";

//Traitement de la suppression commentaire
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
    $stmt->execute([$_SESSION["utilisateur_id"], $contenu, $id_parent, $id_page]);

    header("Location: " . $_SERVER['PHP_SELF'] . "?id_page=$id_page");
    exit();
}

// Récupération des commentaires
$sql = "SELECT commentaires.*, utilisateurs.pseudo FROM commentaires 
        JOIN utilisateurs ON commentaires.id_utilisateur = utilisateurs.id WHERE commentaires.id_page =4
        ORDER BY commentaires.id_commentaire ASC";
$stmt = $pdo->query($sql);
$commentaires = $stmt->fetchAll();
?>

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
        <h1>Liste de tout les Tutoriels</h1>
        <ul class="tutorial-list">
            <li><a href="Tuto-finir.php">Tuto finir Minecraft</a></li>
            <li><a href="maintenance.php">Tuto Construction</a></li>
            <li><a href="Tuto-redstone.php">Tuto Redstone</a></li>
            <li><a href="maintenance.php">Tuto Survie</a></li>
            <li><a href="maintenance.php">Tuto Exploration</a></li>
        </ul>

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
    <a href="#" class="top-link">Retour en haut</a>
    </main>
</body>
<script src="script.js"></script>
</html>
