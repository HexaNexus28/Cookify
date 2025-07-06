<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Question</title>
    <style>
        body {
            background-image: url('../images/jeu_quiz/jeu.webp');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-color: rgba(244, 244, 244, 0.8); /* Ajout d'une couleur de fond semi-transparente pour améliorer la lisibilité */
        }
        .container {
            max-width: 800px; /* Largeur augmentée */
            width: 90%; /* Assure que le conteneur prend 90% de la largeur de l'écran sur les petits écrans */
            margin: 20px auto;
            padding: 30px; /* Padding augmenté pour plus d'espace interne */
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1s ease-in-out;
        }
        h1 {
            text-align: center;
            color: #333;
            animation: slideIn 1s ease-in-out;
        }
        .form-group {
            margin-bottom: 20px;
            animation: fadeIn 1s ease-in-out;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 2px solid;
            border-radius: 4px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }
        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
        }
        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: rgb(66, 196, 98);
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }
        .form-group button:hover {
            background-color: rgb(215, 170, 65);
            transform: scale(1.05);
        }
        .back-button {
            position: absolute;
            top: 20px;
            right: 50px;
            padding: 10px 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border: 1px solid #ccc;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }
        .back-button:hover {
            background-color: rgba(255, 255, 255, 1);
            transform: scale(1.05);
        }
        .neon-green {
            border-color: #39FF14;
        }
        .neon-blue {
            border-color: #1E90FF;
        }
        .neon-pink {
            border-color: #FF69B4;
        }
        .neon-yellow {
            border-color: #FFFF00;
        }
        .neon-orange {
            border-color: #FFA500;
        }
        .neon-purple {
            border-color: #800080;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        @keyframes slideIn {
            from {
                transform: translateY(-20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    <form action="../controllers/afficher_page_jeu_categories.php">
        <button class="back-button">Retour</button>
    </form>
    <div class="container">
        <h1>Ajouter une Question</h1>
        <form action="../controllers/ajouter_question.php" method="post">
            <div class="form-group">
                <label for="question">Question :</label>
                <textarea id="question" name="question" rows="4" class="neon-green" required></textarea>
            </div>
            <div class="form-group">
                <label for="proposition1">Proposition 1 :</label>
                <input type="text" id="proposition1" name="proposition1" class="neon-blue" required>
            </div>
            <div class="form-group">
                <label for="proposition2">Proposition 2 :</label>
                <input type="text" id="proposition2" name="proposition2" class="neon-pink" required>
            </div>
            <div class="form-group">
                <label for="proposition3">Proposition 3 :</label>
                <input type="text" id="proposition3" name="proposition3" class="neon-yellow" required>
            </div>
            <div class="form-group">
                <label for="proposition4">Proposition 4 :</label>
                <input type="text" id="proposition4" name="proposition4" class="neon-orange" required>
            </div>
            <div class="form-group">
                <label for="reponse_correcte">Réponse Correcte :</label>
                <input type="text" id="reponse_correcte" name="reponse_correcte" class="neon-purple" required>
            </div>
            <div class="form-group">
                <button type="submit">Envoyer</button>
            </div>
        </form>
    </div>
</body>
</html>
