<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>BTTS - Recherche</title>
        <link id="theme-link" rel="stylesheet" href="../css/dark-theme.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    </head>
    <header>
   
        <div class="navbar">
            <div class="mode"><input type="checkbox" id="toggle" class="checkbox">
            <label for="toggle" class="label"></label></div>
            <div class="logo"><a href="../html/index.html">Back to the Stack</a></div>
            <ul class="liens">
                <li><a href="recherche.php">🔎</a></li>
                <li><a href="../html/index.html">Menu Principal</a></li>
                <li><a href="../html/comptech.html">Compétences Techniques</a></li>
                <li><a href="../html/méthode.html">Méthode</a></li>
                <li><a href="../html/anciens clients.html">Expérience</a></li>
                <li><a href="../html/notreequipe.html">Équipe</a></li>
            </ul>
            <a href="../php/signup.php" class="action_btn">Signup</a>
            <a href="../php/login.php" class="action_btn">Login</a>
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
    </header>
    
    <body class="recherche_body">
    <form action="recherche.php" method="GET">
        <label for="competence">Choisir une compétence :</label>
        <select name="competence" id="competence">
            <option value="1">Python</option>
            <option value="4">Django</option>
            <option value="5">React</option>
            <option value="6">TypeScript</option>
            <option value="7">JavaScript</option>
            <option value="8">Node.js</option>
            <option value="9">PHP</option>
            <option value="10">MySQL</option>
            <option value="11">PostgreSQL</option>
            <option value="12">OSINT</option>
            <option value="13">HTML5</option>
            <option value="14">CSS3</option>
        </select>
        <button type="submit">Rechercher</button>
    </form>
        
        <script src="../js/script.js"></script>
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
    </body>
</html>

<?php
// Connexion à la base de données
$host = 'localhost';
$user = 'root';
$pass = 'root';
$db = 'competences_equipe';

$conn = new mysqli($host, $user, $pass, $db);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['competence'])) {
    // Récupérer l'ID de la compétence depuis la requête GET
    $competence_id = (int)$_GET['competence'];

    // Requête pour récupérer le nom de la compétence
    $competence_sql = "
        SELECT nom
        FROM competences
        WHERE id = ?
    ";

    // Préparer et exécuter la requête pour récupérer le nom de la compétence
    if ($stmt = $conn->prepare($competence_sql)) {
        $stmt->bind_param('i', $competence_id); // 'i' pour un entier
        $stmt->execute();
        $stmt->bind_result($competence_name); // Lier le résultat à la variable $competence_name
        $stmt->fetch(); // Récupérer le résultat
        $stmt->close();

        // Vérifier si la compétence a été trouvée
        if ($competence_name) {
            // Requête pour récupérer les membres avec cette compétence
            $sql = "
                SELECT membres.id, membres.nom, membres.email, membres.photo
                FROM membres
                JOIN membre_competences ON membres.id = membre_competences.membre_id
                WHERE membre_competences.competence_id = ?
            ";

            // Préparer et exécuter la requête pour récupérer les membres
            if ($stmt = $conn->prepare($sql)) {
                $stmt->bind_param('i', $competence_id); // 'i' pour un entier
                $stmt->execute();
                $result = $stmt->get_result();

                // Vérifier si des membres ont été trouvés
                if ($result->num_rows > 0) {
                    // Afficher le titre avec le nom de la compétence
                    echo "<h1>Membres ayant la compétence : $competence_name</h1>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<div>";
                        echo "<img src='" . $row['photo'] . "' alt='" . $row['nom'] . "' width='100' height='100'>";
                        echo "<p>Nom: " . $row['nom'] . "</p>";
                        echo "<p>Email: " . $row['email'] . "</p>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>Aucun membre trouvé pour cette compétence.</p>";
                }

                // Fermer la requête préparée
                $stmt->close();
            } else {
                echo "Erreur de préparation de la requête des membres.";
            }
        } else {
            echo "<p>Compétence non trouvée.</p>";
        }
    } else {
        echo "Erreur de préparation de la requête pour la compétence.";
    }
} else {
    echo "<p>Veuillez sélectionner une compétence.</p>";
}

// Fermer la connexion
$conn->close();
?>

