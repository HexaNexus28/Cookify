<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/connexion_cookify.css">
    <title>Document</title>
</head>
<body>
    <div class="form-container">
        <h1>Bienvenue</h1>
        <?php if (!empty($error_message)): ?>
            <p class="error-message"><?= htmlspecialchars($error_message) ?></p>
        <?php endif; ?>
        <form action="../controllers/verification.php" method="post">
            <p>Email :</p>
            <input type="email" name="email" id="email" placeholder="Entrez votre email" required>
            <p>Mot de passe :</p>
            <input type="password" name="mot_de_passe" id="mot_de_passe" placeholder="Entrez votre mot de passe" required>
            <input type="submit" value="Connexion">
        </form>
        <form action="../controllers/afficher_inscription.php" method="post">
            <input type="submit" value="Créer un compte">
        </form>
    </div>
</body>
</html>
