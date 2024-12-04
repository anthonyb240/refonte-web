<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link id="theme-link" rel="stylesheet" href="../css/dark-theme.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&family=Zen+Dots&display=swap" rel="stylesheet">
</head>
    <title>BTTS - Inscription</title>
</head>
<header>
   
    <div class="navbar">
        <div class="mode"><input type="checkbox" id="toggle" class="checkbox">
        <label for="toggle" class="label"></label></div>
        <div class="logo"><a href="index.html">Back to the Stack</a></div>
        <ul class="liens">
            <li><a href="recherche.html">🔎</a></li>
            <li><a href="index.html">Menu Principal</a></li>
            <li><a href="comptech.html">Compétences Techniques</a></li>
            <li><a href="méthode.html">Méthode</a></li>
            <li><a href="anciens clients.html">Expérience</a></li>
            <li><a href="notreequipe.html">Équipe</a></li>
        </ul>
        <a href="../php/login.php" class="action_btn">Login</a>
        <div class="toggle_btn">
            <i class="fa-solid fa-bars" style="color: #ffffff;"></i>
        </div>
    </div>

    <div class="dropdown_menu">
        <ul>
            <li><a href="recherche.html">🔎</a></li>
            <li><a href="index.html">Menu Principal</a></li>
            <li><a href="comptech.html">Compétences Techniques</a></li>
            <li><a href="méthode.html">Méthode</a></li>
            <li><a href="anciens clients.html">Expérience</a></li>
            <li><a href="notreequipe.html">Équipe</a></li>
            <li><a href="../php/login.php" class="action_btn">Login</a></li>
        </ul>
        
    </div>
</header>

<body class="signup_body">
    <div class="signup_form">
        <h1>Remplissez le formulaire avec vos informations</h1>
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

            <input type="submit" value="M'inscrire" name="ok">
        </form>
    </div>
    
<?php
$servername = "localhost";
$username = "root";
$password = "root";

try {
    $bdd = new PDO("mysql:host=$servername;dbname=utilisateurs", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $bdd->exec("SET NAMES 'utf8'");
}

catch(PDOException $e){
    echo "Erreur : ".$e->getMessage();
}

if(isset($_POST['ok'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $pseudo = $_POST['pseudo'];
    $mdp = $_POST['mdp'];

    $requete = $bdd->prepare("INSERT INTO users VALUES (0, :pseudo, :nom, :prenom, MD5(:mdp), :email)");
    $requete->execute(
        array(
            "pseudo" => $pseudo,
            "nom" => $nom,
            "prenom" => $prenom,
            "mdp" => $mdp,
            "email" => $email
        )
    );
    echo "Utilisateur ajouté avec succès.";
}
?>
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