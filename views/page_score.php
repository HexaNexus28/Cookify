<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats du Quiz de Cuisine</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('../images/jeu_quiz/jeu.webp');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center -100px;
            color: #333;
            text-align: center;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #4CAF50;
        }
        .score {
            font-size: 2em;
            margin: 20px 0;
        }
        .summary {
            margin: 20px 0;
        }
        .button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 20px 2px;
            cursor: pointer;
            border-radius: 5px;
        }
        .button:hover {
            background-color: #45a049;
        }
        .etoile-image {
            width: 40px; 
            height: 40px; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Résultats du Quiz de Cookify</h1>
        <div class="score" id="score">Votre score : <?php echo $_SESSION['score']; ?> / <?php echo $nombre_total_question; ?></div>
        <div class="summary">
            <p>
                <?php
                foreach ($_SESSION['etoile'] as $etoile) {
                    echo '<img src="' . ($etoile) . '" alt="etoile" class="etoile-image">';
                }
                ?>
            </p>
            <p><?php echo $message; ?></p>
        </div>
        <a href="../controllers/afficher_page_jeu_categories.php" class="button">Rejouer</a>
        <a href="../controllers/jouer_quiz.php" class="button">Retour à l'accueil</a>
    </div>
</body>
</html>
