on<?php
session_start();
require 'config.php';
$Message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pseudo = $_POST['pseudo'];
    $mot_de_passe = $_POST['mot_de_passe'];

    try {
        $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE pseudo = ?");
        $stmt->execute([$pseudo]);
        $user = $stmt->fetch();
        if ($user && password_verify($mot_de_passe, $user['mot_de_passe'])) {
            $_SESSION['utilisateur_id'] = $user['id'];
            $_SESSION['pseudo'] = $user['pseudo'];
            $_SESSION['role'] = $user['role'] ?? 'utilisateur';
            $Message = "<p style='color:#0066cc;'>Connexion réussie !</p>";
            echo '<meta http-equiv="refresh" content="3;url=index.php">';
        } else {
            $Message = "<p style='color:red;'>Pseudo ou mot de passe incorrect.</p>";
        }
    } catch (PDOException $e) {
        $Message = "<p style='color:red;'>Erreur lors de la connexion : " . htmlspecialchars($e->getMessage()) . "</p>";
    }
}

?>
<!DOCTYPE HTML>
<head>
<meta charset="UTF-8">
	<title>Connexion</title>
	<link rel="stylesheet" href="style.css">
</head>
<body style="justify-content: center; align-items: center;">
  <div class="box">
    <h2>Connexion</h2>
    <form method="POST" action="connexion.php">
      <div class="form-group">
        <label for="pseudo">Pseudo :</label>
        <input type="text" id="pseudo" name="pseudo" required>
      </div>
      <div class="form-group">
        <label for="mot_de_passe">Mot de passe :</label>
        <input type="password" id="mot_de_passe" name="mot_de_passe" required>
      </div>
      <?php if (!empty($Message)) : ?>
        <div class="error-message"><?= $Message ?></div>
      <?php endif; ?>

      <div class="form-actions">
        <input type="submit" value="Se connecter">
      </div>
    </form>
  </div>
<script src="script.js"></script>
</body>
</html>
