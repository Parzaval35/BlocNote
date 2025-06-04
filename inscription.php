<?php
require 'config.php';
$Message = '';
session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];
    $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);

    try {
        $stmt = $pdo->prepare("INSERT INTO utilisateurs (pseudo, email, mot_de_passe) VALUES (?, ?, ?)");
        $stmt->execute([$pseudo, $email, $mot_de_passe]);
	$stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE pseudo = ?");
        $stmt->execute([$pseudo]);
        $user = $stmt->fetch();
        $_SESSION['utilisateur_id'] = $user['id'];
        $_SESSION['pseudo'] = $user['pseudo'];
        $_SESSION['role'] = $user['role'] ?? 'utilisateur';
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
	<title>Inscription</title>
	<link rel="stylesheet" href="style.css">
</head>
<body style="justify-content: center; align-items: center;">
  <div class="box">
    <h2>Inscription</h2>
    <form method="POST" action="Inscription.php" autocomplete="on">
      <div class="form-group">
        <label for="pseudo">Pseudo :</label>
        <input type="text" id="pseudo" name="pseudo" autocomplete="username" required>
      </div>
      <div class="form-group">
        <label for="mot_de_passe">Mot de passe :</label>
        <input type="password" id="mot_de_passe" name="mot_de_passe" autocomplete="new-password" required>
      </div>
      <div class="form-group">
        <label for="email">E-mail :</label>
        <input type="email" id="email" name="email" autocomplete="email" required>
      </div>

      <?php if (!empty($Message)) : ?>
        <div class="error-message"><?= $Message ?></div>
      <?php endif; ?>

      <div class="form-actions">
        <input type="submit" value="S'inscrire">
      </div>
    </form>
  </div>
</body>
</html>
</div>
</body>
</html>
