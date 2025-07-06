<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="../styles/afficher_inscription_cookify.css">
</head>
<body>
    <div class="form-container">
        <h1>Bienvenue dans la page d'inscription</h1>
        <form action="../controllers/retour_connexion.php" method="post">
            <p>Nom :</p>
            <input type="text" name="nom" placeholder="nom" required>
            <p>Prénom :</p>
            <input type="text" name="prenom" placeholder="prenom" required>
            <p>Email :</p>
            <input type="email" name="email" placeholder="email" required>
            <p>Mot de passe :</p>
            <input type="password" name="mot_de_passe" placeholder="mot de passe" required>
            <input type="submit" value="S'inscrire">
        </form>
    </div>
</body>
</html>
