<?php
session_start();
require 'config.php';
$isConnected = isset($_SESSION["utilisateur_id"]);
$sql = "SELECT commentaires.*, utilisateurs.pseudo FROM commentaires 
        JOIN utilisateurs ON commentaires.id_utilisateur = utilisateurs.id 
        ORDER BY commentaires.id_commentaire DESC";
$stmt = $pdo->query($sql);
$commentaires = $stmt->fetchAll();
?>
<!DOCTYPE HTML>
<head>
<meta charset="UTF-8">
	<title>affichage commentaires</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

<div class= box>
<?php


echo "<h2>Liste des commentaires :</h2><ul>";
foreach ($commentaires as $commentaire) {
 echo "<li><strong>{$commentaire['pseudo']}</strong><br>{$commentaire['contenu']}</li><br>";
}
echo "</ul>";
?>
<form method="post">
      <button type="submit" name="ajouter">Ajouter un commentaire</button>
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["ajouter"])) {
        if ($isConnected) {
            header("Location: ajouter_commentaire.php");
            exit();
        } else {
            echo "<p style='color:red;'>Vous ne pouvez pas ajouter de commentaires. Connectez-vous ou inscrivez-vous.</p>";
        }
    }
    ?>
</div>
</body>
</html>
