<?php
include 'connexion.php'; // Inclure la connexion à la base de données

// Vérifier si un mot-clé a été soumis
if (isset($_GET['keywords'])) {
    $keywords = htmlspecialchars($_GET['keywords']); // Sécuriser l'entrée de l'utilisateur

    // Requête SQL pour récupérer les membres en fonction de la compétence
    $stmt = $pdo->prepare("
        SELECT membres.id, membres.nom, GROUP_CONCAT(competences.nom SEPARATOR ', ') AS competences
        FROM membres
        INNER JOIN membre_competences ON membres.id = membre_competences.membre_id
        INNER JOIN competences ON membre_competences.competence_id = competences.id
        WHERE competences.nom LIKE :keywords
        GROUP BY membres.id
    ");
    
    // Exécution de la requête
    $stmt->bindValue(':keywords', "%$keywords%", PDO::PARAM_STR);
    $stmt->execute();
    
    // Récupérer tous les résultats
    $resultats = $stmt->fetchAll();
} else {
    $resultats = [];
}
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>BTTS - Recherche</title>
        <link id="theme-link" rel="stylesheet" href="../css/dark-theme.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    </head>
    <body class="recherche_body">
        <form class="Barre_de_recherche" name="fo" method="get" action="recherche.php">
            <input type="text" name="keywords" placeholder="Mots-clés" />
            <input type="submit" name="valider" value="🔎" />
        </form>

        <div class="Resultats">
            <?php if (count($resultats) > 0): ?>
                <div id="nbr"><?php echo count($resultats); ?> résultat(s) trouvé(s)</div>
                <ol>
                    <?php foreach ($resultats as $membre): ?>
                        <li>
                            <!-- Lien vers le profil du membre -->
                            <a href="profil.php?id=<?php echo $membre['id']; ?>">
                                <strong><?php echo htmlspecialchars($membre['nom']); ?></strong> - Compétences : <?php echo htmlspecialchars($membre['competences']); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ol>
            <?php else: ?>
                <div id="nbr">Aucun résultat trouvé</div>
            <?php endif; ?>
        </div>

        <script src="../js/script.js"></script>
    </body>
</html>
