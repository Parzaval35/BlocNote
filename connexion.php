<?php
session_start();
$MessageErreur = '';
$pdo = new PDO('mysql:host=localhost;dbname=blocnote', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pseudo = $_POST["pseudo"] ?? '';
    $mot_de_passe = $_POST["mot_de_passe"] ?? '';
    
    $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE pseudo=?");
    $stmt->execute([$pseudo]);
    $utilisateur = $stmt->fetch();
    
    if ($utilisateur && password_verify($mot_de_passe, $utilisateur["mot_de_passe"])) {
        $_SESSION["utilisateur"] = $utilisateur;
        header("Location: index.php");
        exit();
    } else {
        $MessageErreur = "<p style='color:red;'>Identifiants incorrects</p>";
    }
}
?>

<DOCTYPE! HTML>
<head>
<meta charset="UTF-8">
	<title>Connexion</title>
	<style>
        	body { 
  			margin: 0; /* Enlève les marges par défaut */
  			height: 100vh; /* Prend 100% de la hauteur de la fenêtre */
  			background-size: cover; /* L’image couvre toute la zone */
  			background-position: center; /* Centrée */
  			background-repeat: no-repeat;
			background-image: url("./images/fond_connexion.jpg");  ;
			color: black;
			justify-content: center;   /* centrage horizontal */
      			align-items: center;       /* centrage vertical */
			text-align: center;
			display: flex;
		}
		.box {
      			background: #ccc;
      			width: 300px;
      			margin: 100px; 
      			padding: 20px;
      			border-radius: 5px;
    		}
	</style>
</head>
<div class= box>
    <form method="POST" action="connexion.php">
        Nom d’utilisateur : <input type="text" name="utilisateur" required><br>
	<br>
        Mot de passe : <input type="password" name="mot_de_passe" required><br>
	<br>
        <input type="submit" value="Se connecter">
	<?= $MessageErreur ?>
    </form>
</div>
</body>
</html>

