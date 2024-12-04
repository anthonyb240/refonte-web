<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=competences_equipe', 'root', 'root');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->query("SET NAMES UTF8");
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>
