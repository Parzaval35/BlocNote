<?php
$host = 'localhost';
$bddname = 'blocnote';
$username = 'root';
$password = 'S3Gsm2P!mysql';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$bddname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>
