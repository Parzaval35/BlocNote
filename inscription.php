<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];
    $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);

    try {
        $pdo->exec("USE blocnote");
        $stmt = $pdo->prepare("INSERT INTO utilisateurs (pseudo, email, mot_de_passe) VALUES (?, ?, ?)");
        $stmt->execute([$pseudo, $email, $mot_de_passe]);
        echo "Inscription réussie !";
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>

<!DOCTYPE HTML>
<head>
<meta charset="UTF-8">
	<title>Connexion</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<div class= box>
    <form method="POST">
        Pseudo : <input type="text" name="pseudo" placeholder="Pseudo" required><br>
	<br>
        Mot de passe : <input type="password" name="mot_de_passe" placeholder="Mot de passe" required><br>
	<br>
        E-mail : <input type="email" name="email" placeholder="Email" required><br>
	<br>
        <input type="submit" value="S'inscrire">
    </form>
</div>
</body>
</html>
