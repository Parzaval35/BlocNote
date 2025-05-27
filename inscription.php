<form method="POST">
    <input type="text" name="pseudo" placeholder="Pseudo" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="mot_de_passe" placeholder="Mot de passe" required>
    <button type="submit">S'inscrire</button>
</form>

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
        header("Location: connexion.php");
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>
