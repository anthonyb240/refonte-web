<?php
include 'connexion.php';

header('Content-Type: text/html; charset=UTF-8');

// Vérifier si un ID est passé dans l'URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Récupérer les informations du membre
    $stmt = $pdo->prepare("SELECT * FROM membres WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $membre = $stmt->fetch();

    // Récupérer les compétences associées
    $stmt2 = $pdo->prepare("SELECT competences.nom FROM competences
                            INNER JOIN membre_competences ON competences.id = membre_competences.competence_id
                            WHERE membre_competences.membre_id = :id");
    $stmt2->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt2->execute();
    $competences = $stmt2->fetchAll();
} else {
    die("Aucun ID spécifié !");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BTTS - <?php echo htmlspecialchars($membre['nom']); ?></title>

    <link id= "theme-link" rel="stylesheet" href="../css/dark-theme.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;700&family=Zen+Dots&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <h1 class="presentation_h1"><?php echo htmlspecialchars($membre['nom']); ?></h1>
    </header>
    
    <section class="texte">
    <p><img src="<?php echo $membre['photo']; ?>" alt="Portrait de <?php echo $membre['nom']; ?>">
    <div class="presentation_text-container">
        <article class="block">
            <p>Description : <?php echo htmlspecialchars(mb_convert_encoding($membre['test'], 'UTF-8', 'auto')); ?></p>
        </article>
    </section>
    <article class="block">
        <p>Email : <?php echo htmlspecialchars($membre['email']); ?></p>
    </article>
    <article class="block">
        <p>Formation : <?php echo htmlspecialchars($membre['formation']); ?></p>
    </article>
    </div>

    <article class="block">
    <h2>Compétences :</h2>
    <p>
        <?php foreach ($competences as $competence) : ?>
            <li><?php echo htmlspecialchars($competence['nom']); ?></li>
        <?php endforeach; ?>
    </p>
    </article>

    <script src="../js/script.js"></script>
    <script type="text/javascript">
      function googleTranslateElementInit() {
          new google.translate.TranslateElement(
              {pageLanguage: 'en'},
              'google_translate_element'
          );
      } 
    </script>
    <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>    

</body>
</html>
