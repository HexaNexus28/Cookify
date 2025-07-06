<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/accueil.css">
  <title>Document</title>
</head>
<body>
<div class="header">
        <div class="logo">
            <form action="" method="POST">
                <button class="btn-img-logo">
                    <img src="../images/logo_cookify.jpg" alt="logo-cookify" width="100px">
                </button>
            </form>
        </div>

        <div class="nav-list">
            <nav>
                <ul>
                    <li><a href="../controllers/afficher_page_categories_recettes_cookify.php">Recettes</a></li>
                    <li><a href="../controllers/afficher_cuisinotheque.php">Cuisinothèque</a></li>
                    <li><a href="../controllers/jouer_quiz.php">Jeu de quiz</a></li>
                    <li><a href="">À propos de nous</a></li>
                </ul>
            </nav>
        </div>

        <div class="connexion">
            <div class="search-container">
            <input type="text" placeholder="Rechercher...">
            <button type="submit"><span class="material-symbols-outlined">search</span></button>
        </div>
            <?php 
                if (!empty($affichage)){
                echo $affichage ;
                }
            ?>
</div>
    
</body>
</html>