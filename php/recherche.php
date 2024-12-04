<?php
include 'connexion.php';

// Vérifier si un mot-clé est envoyé par la méthode GET
if (isset($_GET['keywords'])) {
    $keywords = htmlspecialchars($_GET['keywords']); // Sécuriser l'entrée de l'utilisateur
    echo "Recherche pour: $keywords<br>";  // Affichage pour vérifier la valeur des mots-clés
    
    // Requête pour récupérer les membres qui ont la compétence correspondante
    $stmt = $pdo->prepare("
        SELECT membres.nom, membres.id, GROUP_CONCAT(competences.nom SEPARATOR ', ') AS competences
        FROM membres
        INNER JOIN membre_competences ON membres.id = membre_competences.membre_id
        INNER JOIN competences ON membre_competences.competence_id = competences.id
        WHERE competences.nom LIKE :keywords
        GROUP BY membres.id
    ");
    $stmt->bindValue(':keywords', "%$keywords%", PDO::PARAM_STR); // Recherche par mot-clé

    // Afficher la requête SQL pour déboguer
    echo "Requête SQL: " . $stmt->queryString . "<br>";

    $stmt->execute();
    $resultats = $stmt->fetchAll();

    // Afficher les résultats pour vérifier si des profils sont trouvés
    if ($resultats) {
        echo "Résultats trouvés: <br>";
        var_dump($resultats);  // Déboguer le tableau de résultats
    } else {
        echo "Aucun résultat trouvé.<br>";
    }
} else {
    $resultats = []; // Aucun résultat par défaut
}
?>
