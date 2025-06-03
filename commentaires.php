<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=blocnote', 'root', '');
$isConnected = isset($_SESSION["utilisateur_id"]);

// Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["commentaire"])) {
    $contenu = $_POST["commentaire"];
    $id_parent = !empty($_POST["id_parent"]) ? intval($_POST["id_parent"]) : null;

    $stmt = $pdo->prepare("INSERT INTO commentaires (id_utilisateur, contenu, id_parent) VALUES (?, ?, ?)");
    $stmt->execute([$_SESSION["utilisateur_id"], $contenu, $id_parent]);

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Récupération des commentaires
$sql = "SELECT commentaires.*, utilisateurs.pseudo FROM commentaires 
        JOIN utilisateurs ON commentaires.id_utilisateur = utilisateurs.id 
        ORDER BY commentaires.id_commentaire ASC";
$stmt = $pdo->query($sql);
$commentaires = $stmt->fetchAll();
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title>Commentaires</title>
</head>
<body>
<div class="box">
<h2>Liste des commentaires :</h2>
<section class="comment-section" id="commentaires">	
<ul>
<?php foreach ($commentaires as $commentaire): ?>
    <?php if ($commentaire["id_parent"] === null): ?>
        <li>
            <strong><?= $commentaire["pseudo"] ?></strong><br><?= $commentaire["contenu"] ?>
            <br>
            <!-- Affichage des réponses -->
            <?php foreach ($commentaires as $reponse): ?>
                <?php if ($reponse["id_parent"] == $commentaire["id_commentaire"]): ?>
                    <div style="margin-left:30px;">
                        Réponse de <?= $reponse["pseudo"] ?><br><?= $reponse["contenu"] ?>
			<br>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>

            <!-- Lien Répondre -->
            <a href="?repondre=<?= $commentaire['id_commentaire']#commentaires ?>">Répondre</a>

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
<a href="?ajouter=1#commentaires">Ajouter un commentaire</a>

<?php if (isset($_GET["ajouter"])): ?>
    <?php if ($isConnected): ?>
        <form method="post">
            <input type="hidden" name="id_parent" value="">
            <textarea name="commentaire" required></textarea><br>
            <button type="submit">Publier le commentaire</button>
        </form>
    <?php else: ?>
        <p style="color:red;">Vous ne pouvez pas ajouter de commentaire, connectez-vous ou inscrivez-vous.</p>
    <?php endif; ?>
<?php endif; ?>
</div>
</body>
</html>
