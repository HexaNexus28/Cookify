<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/modes_creation.css">
    <title>Document</title>
</head>
<body>
    <div class="top-buttons">
        <form action="" method="post">
        <button class="Btn1">Règles du jeu</button>
        </form>
        <form action="../controllers/jouer_quiz.php" method="post">
            <button class="Btn2">Retour</button>
        </form>
    </div>
    <div class="center-buttons">
    <form action="../controllers/creer_partie.php" method="post"><button class="game-mode-button1">Créer un partie</button></form>
    <form action="../controllers/rejoindre_partie.php" method="post"><button class="game-mode-button2">Rejoindre une partie</button> </form>
    </div>
</body>
</html>