<?php
require 'config.php';
$Message = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];
    $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);

    try {
        $stmt = $pdo->prepare("INSERT INTO utilisateurs (pseudo, email, mot_de_passe) VALUES (?, ?, ?)");
        $stmt->execute([$pseudo, $email, $mot_de_passe]);
        $Message = "<p style='color:green;'>Inscription réussie!</p>";
	echo '<meta http-equiv="refresh" content="3;url=index.php">';
    } catch (PDOException $e) {
        $Message = "<p style='color:red;'>Erreur : " . $e->getMessage() . "</p>";
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

    <form method="POST">
	<div class= box>
        Pseudo : <input type="text" name="pseudo" placeholder="Pseudo"  required><br>
	<br>
        Mot de passe : <input type="password" name="mot_de_passe" placeholder="Mot de passe"  required><br>
	<br>
        E-mail : <input type="email" name="email" placeholder="Email"  required><br>
	<br>
        <input type="submit" value="S'inscrire">
	</div>
	<?php if (!empty($Message)) : ?>
    		<div class="box2">
        	<?= $Message ?>
    		</div>
    	<?php endif; ?>
	exit();
    </form>

</body>
</html>
</div>
</body>
</html>
