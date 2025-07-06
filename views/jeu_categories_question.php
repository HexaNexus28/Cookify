<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catégories de Questions pour Quiz</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('../images/jeu_quiz/jeu.webp');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center -100px;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            color: #fff; /* Couleur du texte pour mieux contraster avec l'image de fond */
        }
        .container {
            max-width: 1000px; /* Ajusté pour accueillir 4 éléments côte à côte */
            margin: 20px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8); /* Fond semi-transparent pour les cartes */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .category-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin: 20px 0;
        }
        .category-item {
            flex: 1 1 calc(25% - 20px); /* Ajuster la largeur pour 4 éléments par ligne */
            max-width: calc(25% - 20px);
            box-sizing: border-box;
            text-align: center;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            overflow: hidden;
        }
        .category-item:hover {
            transform: scale(1.05);
        }
        .category-item form {
            margin: 0;
        }
        .category-item button {
            background: none;
            border: none;
            cursor: pointer;
            text-align: center;
            padding: 10px;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .category-image {
            width: 100%;
            height: auto;
            border-radius: 10px 10px 0 0;
            margin-bottom: 10px;
        }
        .category-name {
            font-size: 1.2em;
            margin: 0;
            font-weight: bold;
            color: #333;
        }
        .category-description {
            font-size: 1em;
            margin: 0;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sélectionnez une Catégorie de Questions</h1>
        <div class="category-list">
            <?php
            $index = 0;
            foreach ($categories as $categorie) :
                $action = ($index == 3) ? '../controllers/ajouter_question_quiz.php' : '../controllers/jouer_solo.php';
            ?>
                <div class="category-item">
                    <form method="post" action="<?php echo $action; ?>">
                        <button type="submit" name="categorie" value="<?php echo $categorie['titre']; ?>">
                            <img src="../images/jeu_quiz/<?php echo $categorie['image']; ?>" alt="<?php echo $categorie['titre']; ?>" class="category-image">
                            <h3 class="category-name"><?php echo $categorie['titre']; ?></h3>
                            <p class="category-description"><?php echo $categorie['description']; ?></p>
                        </button>
                    </form>
                </div>
            <?php
                $index++;
            endforeach;
            ?>
        </div>
    </div>
</body>
</html>
