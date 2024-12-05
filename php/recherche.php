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
    <form action="recherche.php" method="GET" class="Barre_de_recherche">
        <select name="competence" id="competence">
        <option value="" disabled selected>Choisir une compétence</option>
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
        <button type="submit">🔎</button>
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
$host = 'localhost';
$user = 'root';
$pass = 'root';
$db = 'competences_equipe';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['competence'])) {
    $competence_id = (int)$_GET['competence'];

    $competence_sql = "
        SELECT nom
        FROM competences
        WHERE id = ?
    ";

    if ($stmt = $conn->prepare($competence_sql)) {
        $stmt->bind_param('i', $competence_id);
        $stmt->execute();
        $stmt->bind_result($competence_name);
        $stmt->fetch();
        $stmt->close();

        if ($competence_name) {
            $sql = "
                SELECT membres.id, membres.nom, membres.email, membres.photo
                FROM membres
                JOIN membre_competences ON membres.id = membre_competences.membre_id
                WHERE membre_competences.competence_id = ?
            ";

            if ($result->num_rows > 0) {
                echo "<h2 class='resultat-titre'>Membres ayant la compétence : $competence_name</h2>";
                echo "<div class='resultats-container'>";
                while ($row = $result->fetch_assoc()) {
                    echo "<a href='membre.php?id=" . $row['id'] . "' class='resultat-link'>";
                    echo "<div class='resultat-item'>";
                    echo "<img src='" . $row['photo'] . "' alt='" . $row['nom'] . "' class='resultat-photo'>";
                    echo "<div class='resultat-details'>";
                    echo "<p class='resultat-nom'>Nom: " . $row['nom'] . "</p>";
                    echo "<p class='resultat-email'>Email: " . $row['email'] . "</p>";
                    echo "</div>";
                    echo "</div>";
                    echo "</a>";
                }
                echo "</div>";
            } else {
                echo "<p>Aucun membre trouvé pour cette compétence.</p>";
            }

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

$conn->close();
?>

