<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=blocnote', 'root', '');
$isConnected = isset($_SESSION["utilisateur_id"]);
$id_page = isset($_GET["id_page"]) ? intval($_GET["id_page"]) : 4;

// Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["commentaire"])) {
    $contenu = $_POST["commentaire"];
    $id_parent = !empty($_POST["id_parent"]) ? intval($_POST["id_parent"]) : null;
    $stmt = $pdo->prepare("INSERT INTO commentaires (id_utilisateur, contenu, id_parent,id_page) VALUES (?, ?, ?,?)");
    $stmt->execute([$_SESSION["utilisateur_id"], $contenu, $id_parent]);

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
            <li><a href="tuto_redstone.php">Tuto Redstone</a></li>
            <li><a href="tuto_construction.php">Tuto Construction</a></li>
            <li><a href="tuto_survie.php">Tuto Survie</a></li>
            <li><a href="tuto_exploration.php">Tuto Exploration</a></li>
        </ul>

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
	    <input type="hidden" name="id_page" value="4">
            <textarea name="commentaire" required></textarea><br>
            <button type="submit">Publier le commentaire</button>
        </form>
    <?php else: ?>
        <p style="color:red;">Vous ne pouvez pas ajouter de commentaire, connectez-vous ou inscrivez-vous.</p>
    <?php endif; ?>
<?php endif; ?>

</section>
    </main>
    <footer>
        <a href="#politique-confidentialite">Politique de confidentialité</a> |
        <a href="#mentions-legales">Mentions légales</a>
    </footer>
    <script src="script.js"></script>
</body>
</html>
