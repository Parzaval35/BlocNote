
<?php
session_start();
require 'config.php';
$MessageErreur = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pseudo = $_POST['pseudo'];
    $mot_de_passe = $_POST['mot_de_passe'];
    $pdo->exec("USE blocnote");
    $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE pseudo = ?");
    $stmt->execute([$pseudo]);
    $user = $stmt->fetch();

    if ($user && password_verify($mot_de_passe, $user['mot_de_passe'])) {
        $_SESSION['utilisateur_id'] = $user['id'];
        $_SESSION['pseudo'] = $user['pseudo'];
        $_SESSION['role'] = $user['role'];
        header("Location: index.php");
        exit;
    } else {
        $MessageErreur = "<p style='color:red;'>Identifiants incorrects</p>";
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
        Pseudo : <input type="text" name="pseudo" required><br>
	<br>
        Mot de passe : <input type="password" name="mot_de_passe" required><br>
	<br>
        <input type="submit" value="Se connecter">
	<?= $MessageErreur ?>
    </form>
</div>
</body>
</html>
