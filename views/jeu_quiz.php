<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amusez-vous avec cookify</title>
    <link rel="stylesheet" href="../styles/modes.css">
</head>
<body>
    <div class="top-buttons">
        <form action="" method="post">
        <button class="Btn1">Règles du jeu</button>
        </form>
        <form action="../controllers/afficher_page_accueil_cookify.php" method="post">
            <button class="Btn2">Quitter</button>
        </form>
    </div>
    <div class="center-buttons">
        <form action="../controllers/afficher_page_jeu_categories.php" method="post">
            <button class="game-mode-button1">Mode solo</button>
        </form>
        <form action="../controllers/mode_multijoueur.php" method="post">
            <button class="game-mode-button2">Mode Multijoueur</button>
        </form>
    </div>
</body>
</html>
