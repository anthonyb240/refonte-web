<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BTTS - Inscription</title>
    <link id="theme-link" rel="stylesheet" href="../css/dark-theme.css">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;700&family=Zen+Dots&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="sha1.js"></script>
</head>

<body class="signup_body">
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
    </header>

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

    <div class="signup_form">
        <h1>Formulaire d'inscription</h1>
        <form method="POST" action="">
            <label for="nom">Votre Nom :</label>
            <input type="text" id="nom" name="nom" placeholder="Nom" required>

            <label for="prenom">Votre Prénom :</label>
            <input type="text" id="prenom" name="prenom" placeholder="Prénom" required>

            <label for="email">Votre Email :</label>
            <input type="email" id="email" name="email" placeholder="Email" required>

            <label for="pseudo">Votre Pseudo :</label>
            <input type="text" id="pseudo" name="pseudo" placeholder="Pseudo" required>

            <label for="mdp">Votre Mot de Passe :</label>
            <input type="password" id="mdp" name="mdp" placeholder="Mot de Passe" required>

            <input type="submit" id="button" value="M'inscrire" name="ok">
            <div id="result"></div>
        </form>
    </div>

<script>
    $(function()) {
        $("#button").on("click", function() {
            var sha = sha1($("#mdp").val()).toUpperCase();
            var prefix = sha.substring(0, 5);
            var suffix = sha.substring(5, sha.length);

            $.ajax({
                url: "https://api.pwnedpasswords.com/range/" + prefix
            }).done(function (response) {
                var hashes = response.split('\n');
                var breached = false;

                for(let i =0; i < hashes.length; i++) {
                    var hash = hashes[i];
                    var h = hash.split(':');

                    if (h[0] === suffix) {
                        $("#result").html("Mot de passe compromis." + h[1] + " times.");
                        breached = true;
                        break;
                    }
                }

                if (!breached) {
                    <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "root";

                        try {
                            $bdd = new PDO("mysql:host=$servername;dbname=utilisateurs", $username, $password);
                            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        } catch (PDOException $e) {
                            echo "Erreur : " . $e->getMessage();
                        }
                
                
                        if (isset($_POST['ok'])) {
                            $email = $_POST['email'];
                            $mdp = $_POST['mdp'];
                            $nom = $_POST['nom'];
                            $prenom = $_POST['prenom'];
                            $pseudo = $_POST['pseudo'];
                
                                
                            $requete = $bdd->prepare("INSERT INTO users VALUES (0, :pseudo, :nom, :prenom, MD5(:mdp), :email)");
                            $requete->execute([
                                "pseudo" => $pseudo,
                                "nom" => $nom,
                                "prenom" => $prenom,
                                "mdp" => $mdp,
                                "email" => $email
                            ]);
                            echo "<p>Utilisateur ajouté avec succès.</p>";
                        } 
                    ?>
                }
            });
        });
    }
    </script>
</body>
</html>
