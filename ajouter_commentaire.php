<?php


session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 $commentaire = $_POST["commentaire"];
 $id_parent = null;
 $pdo = new PDO('mysql:host=localhost;dbname=blocnote', 'root', '');
 $sql = "INSERT INTO commentaires (id_utilisateur, contenu,id_parent) VALUES (?, ?, ?)";
 $stmt = $pdo->prepare($sql);
 $stmt->execute([$_SESSION["user"]["id"], $commentaire, $id_parent]);
 echo "<p>Commentaire publié !</p>";
}
?>

<!DOCTYPE HTML>
<head>
	<meta charset="UTF-8" />
    	<title>Ajouter un commentaire</title>
	<link rel="stylesheet" href="style.css">
</head>
		
<body>
	<div class=box>
	<form method="POST" action="ajouter_commentaire.php">
 		<label>Commentaire :</label>
 		<textarea name="commentaire" required></textarea><br><br>
 		<input type="submit" value="Publier le commentaire">
	</form>
	</div>
</body>
</html>