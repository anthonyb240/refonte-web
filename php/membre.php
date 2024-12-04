<?php
include 'connexion.php';

header('Content-Type: text/html; charset=UTF-8');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $pdo->prepare("SELECT * FROM membres WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $membre = $stmt->fetch();
    
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;700&family=Zen+Dots&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <div class="navbar">
            <div class="mode"><input type="checkbox" id="toggle" class="checkbox">
            <label for="toggle" class="label"></label>
        </div>

            <div class="logo"><a href="../html/index.html">Back to the Stack</a></div>
            <ul class="liens">
                <li><a href="recherche.php">🔎</a></li>
                <li><a href="../html/index.html">Menu Principal</a></li>
                <li><a href="../html/comptech.html">Compétences Techniques</a></li>
                <li><a href="../html/méthode.html">Méthode</a></li>
                <li><a href="../html/anciens clients.html">Expérience</a></li>
                <li><a href="../html/notreequipe.html">Équipe</a></li>
            </ul>
            
            <a href="signup.php" class="action_btn">Signup</a>
            <a href="login.php" class="action_btn">Login</a>
            <div class="toggle_btn">
                <i class="fa-solid fa-bars" style="color: #ffffff;"></i>
            </div>

        </div>

        <div class="dropdown_menu">
            <ul>
                <li><a href="recherche.php">🔎</a></li>
                <li><a href="../html/index.html">Menu Principal</a></li>
                <li><a href="../html/comptech.html">Compétences Techniques</a></li>
                <li><a href="../html/méthode.html">Méthode</a></li>
                <li><a href="../html/anciens clients.html">Expérience</a></li>
                <li><a href="../html/notreequipe.html">Équipe</a></li>
                <li><a href="signup.php" class="action_btn2">Signup</a></li>
                <li><a href="login.php" class="action_btn2">Login</a></li>
            </ul>
        </div>
        <h1 class="presentation_h1"><?php echo htmlspecialchars($membre['nom']); ?></h1>
    </header>
    
    <section class="texte_membre">
    <div class="photo_email-container">
        <img class="presentation_img" src="<?php echo $membre['photo']; ?>" alt="Portrait de <?php echo $membre['nom']; ?>">
        <p class="p_email"><h2>Email :</h2> <?php echo htmlspecialchars($membre['email']); ?></p>
        <p class="formation"><h2>Formations :</h2> <?php echo htmlspecialchars($membre['formation']); ?></p>
        <div class="block_membre">
        <p class="competences">
            <h2>Compétences :</h2>             
                <?php foreach ($competences as $competence) : ?>
                <li><?php echo htmlspecialchars($competence['nom']); ?></li>
                <?php endforeach; ?>
        </p>
        </div>
    
    <div class="presentation_text-container">
        <p>
            <?php 
                $text = htmlspecialchars(mb_convert_encoding($membre['test'], 'UTF-8', 'auto'));
                echo nl2br($text); 
            ?>
        </p>
    </div>
</section>

    <div class="block_membre">
        <p class="p_formation">Formation : <?php echo htmlspecialchars($membre['formation']); ?></p>
    </div>
    </div>

    <script>
        const toggleBtn = document.querySelector('.toggle_btn');
        const toggleBtnIcon = document.querySelector('.toggle_btn i');
        const dropDownMenu = document.querySelector('.dropdown_menu');

        toggleBtn.onclick = function() {
            dropDownMenu.classList.toggle('open');
            const isOpen = dropDownMenu.classList.contains('open');
            toggleBtnIcon.classList = isOpen ? 'fa-solid fa-xmark' : 'fa-solid fa-bars';
    };
    </script>



    <script src="../js/script.js"></script>
</body>
</html>
