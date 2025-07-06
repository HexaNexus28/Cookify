<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/afficher_pays.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Gabarito:wght@400..900&family=Manrope:wght@200..800&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Signika:wght@300..700&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">  
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=search"/>
    <link rel="manifest" href="/site.webmanifest">
    <link rel="icon" type="image/png" sizes="32x32" href="../images/android-chrome-512x512.png">
</head>
<body>
        <div class="header">
            <div class="logo">
                <form action="../controllers/afficher_page_accueil_cookify.php" method="POST">
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
                    <li><a href="">A propos de nous</a></li>
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
        </div>

        <div class="titre">
    <h1>Découvrez les recettes des pays</h1>
    <div class="recipes-grid">
        <?php
            foreach($pays as $pays_recette) {
                echo '<div class="recipe-card">';
                echo '<form action="../controllers/afficher_recettes_pays.php" method="post">';
                echo '<button class="pp" name="recette" value="'. $pays_recette["id"] .'"><img src="../images/recettes/pays/' . $pays_recette["image"] . '" alt="' . $pays_recette["nom"] . '"></button>';
                echo '<input type="hidden" name="description" value="'. $pays_recette["description"] .'">';
                echo '<h2>' . $pays_recette["nom"] . '</h2>';
                echo '</form>';
                echo '</div>';
            }
        ?>
        <!-- Nouvel élément de la même taille que les autres cartes -->
        <div class="recipe-card new-element">
            <form action="../controllers/afficher_ajouter_recette.php" method="post">
                <button class="pp" name="recette" value="new_id">
                    <img src="../images/recettes/pays/ajouter.png" alt="Nouvelle recette">
                </button>
                <input type="hidden" name="description" value="Nouvelle description">
                <h2>Ajouter une recette</h2>
            </form>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="footer-container">
        <div class="footer-section">
            <h3>Liens utiles</h3>
            <ul>
                <li><a href="../controllers/afficher_page_accueil_cookify.php">Accueil</a></li>
                <li><a href="../controllers/afficher_page_categories_recettes_cookify.php">Recettes</a></li>
                <li><a href="../controllers/afficher_cuisinotheque.php">Cuisinothèque</a></li>
                <li><a href="../controllers/jouer_quiz.php">Jeu de quiz</a></li>
                <li><a href="#">À propos de nous</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h3>Réseaux sociaux</h3>
            <ul>
                <li><a href="#">Teams</a></li>
                <li><a href="#">OutLook</a></li>
                <li><a href="#">WhatsApp</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h3>Contact</h3>
            <p>Email: GroupeCookify@gmail.com </p>
            <p>Téléphone: +33 6 82 92 00 71</p>
            <p>Adresse: 74 Av. Maurice Thorez, 94200 Ivry-sur-Seine, France</p>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2025 Cookify. Tous droits réservés.</p>
    </div>
</footer>


</body>
</html>