<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Découvrez nos catégories</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Gabarito:wght@400..900&family=Manrope:wght@200..800&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Signika:wght@300..700&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">  
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=search"/>
    <link rel="manifest" href="/site.webmanifest">
    <link rel="icon" type="image/png" sizes="32x32" href="../images/android-chrome-512x512.png">
    <link rel="stylesheet" href="../styles/accueil.css">
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
        <form action="../controllers/afficher_page_accueil_cookify.php" method="post">
        <input type="text" name="researched_item" placeholder="Rechercher...">
        <button type="submit"><span class="material-symbols-outlined">search</span>
        </button>
        </form>
        </div>
            <?php 
                if (!empty($affichage)){
                echo $affichage ;
                }
            ?>
        </div>
    </div>

    <div class="titre">
        <h1>
            Bienvenue sur Cookify!
        </h1>
        <p>
            <span class="first-line">
                Découvrez des recettes équilibrées et savoureuses pour maintenir votre
            </span>
            <span class="second-line">
                forme et votre santé. Rejoignez-nous dans cette aventure culinaire!
            </span>
        </p>
        <div class="actions">
            <form action="../views/page_categories_recettes_cookify.php" method="POST">
                <button class="explore-btn">Explorez nos recettes</button>
            </form>
            <a href="#" class="meet-team-link">
                Rencontrez notre équipe 
            </a>
        </div>
        <div class="image-section">
            <img src="../images/img_un.jpg" alt="Image de couverture">
        </div>
    </div>

    <div class="content-section">
        <div class="text-block">
            <h4>Découvrez nos Catégories</h4>
            <h2>Une alimentation équilibrée</h2>
            <p class="split-text">
                <span>Plongez dans nos catégories de recettes conçues pour</span>
                <span>vous aider à manger sainement sans sacrifier le goût.</span>
                <span>Des astuces nutritionnelles vous attendent!</span>
            </p>
            <p>
                <form action="../views/page_categories_recettes_cookify.php" method="POST">
                    <button class="start-btn">Commencez votre parcours</button>
                </form>
            </p>
            <div class="testimonial-block">
                <div class="testimonial-text">
                    <p>
                        <span>Mangez des fruits et légumes colorés chaque jour.</span>
                        <span>Cela améliorera votre santé et votre bien-être.!</span>
                        <img src="../images/sophie.jpg" alt="Sophie Martin" class="testimonial-img">
                        <p class="soph">Sophie Martin – Nutritionniste</p>
                    </p>
                </div>
            </div>
        </div>
        <div class="image-block">
            <img src="../images/chef_custo.jpg" alt="Image de couverture">
        </div>
    </div>
    <div class="gallery-section">
        <div class="gallery-header">
            <h1>Galerie de Délices Équilibrés</h1>
            <p>
                <span>Explorez notre sélection recommandée de plats équilibrés qui raviront vos papilles tout en<br>
                vous gardant en forme.</span>
            </p>
        </div>
        <div class="gallery-images">
            <?php
                foreach ($recettes as $repertoire => $recetteList) {
                    foreach ($recetteList as $recette) {
                        echo '<div class="gallery-item">';
                        echo '<form action="../controllers/afficher_preparation.php" method="POST">';
                        echo '<input type="hidden" name="repertoire" value="'. $repertoire. '">';
                        echo '<button class="btn" name="id" value="'.$recette['id'].'">';
                        echo '<img src="../images/recettes/'.$repertoire.'/'.$recette['image']. '" alt="'.$recette['titre'].'">';
                        echo '</button>';
                        echo '</form>';
                        echo '</div>';
                    }
                }
                ?>
        </div>
    </div>
    <div class="advice-section">
    <div class="advice-header">
        <h2>Conseils et Astuces</h2>
        <p>Explorez nos articles pour des conseils sur une vie saine et équilibrée.</p>
    </div>
    <div class="advice-blocks">
        <div class="advice-block">
            <a href='../controllers/afficher_page_nutrition.php'><img src="../images/meilleurs_Aliments.jpg" alt="Article 1">
            <div class="advice-content"></a>
                <p class="date">Dec 10, 2024</p>
                <p class="category">Nutrition</p>
                <h3>Les Meilleurs Aliments pour l'Énergie</h3>
                <p>Découvrez comment certains aliments peuvent booster votre énergie et améliorer votre bien-être quotidien.</p>
                <p class="author">Julien Dupont</p>
                <p class="author-title">Expert en Nutrition</p>
            </div>
        </div>
        <div class="advice-block">
            <img src="../images/recette_facile.jpg" alt="Article 1">
            <div class="advice-content">
                <p class="date">Dec 15, 2024</p>
                <p class="category">Cuisine</p>
                <h3>Des Recettes Faciles pour les Soirées Pressées</h3>
                <p>Des idées de repas rapides et équilibrés pour les journées chargées.</p>
                <p class="author">Claire Moreau</p>
                <p class="author-title">Chef Cuisinier</p>
            </div>
        </div>
        <div class="advice-block">
            <img src="../images/preparation_repas.jpg" alt="Article 1">
            <div class="advice-content">
                <p class="date">Dec 18, 2024</p>
                <p class="category">Organisation</p>
                <a href='../controllers/afficher_page_nutrition.php'><h3>L'Art de la Préparation des Repas</h3></a>
                <p>Apprenez à planifier vos repas pour une semaine de succès culinaire.</p>
                <p class="author">Pierre Lefebvre</p>
                <p class="author-title">Planificateur de Repas</p>
            </div>
        </div>
    </div>
</div>

 <section class="newsletter-section">
        <div class="images-container">
            <img src="../images/th.jpg" alt="Pain">
            <img src="../images/th1.jpg" alt="Bol de fruits">
            <img src="../images/th3.jpg" alt="Épices">
        </div>
        <h1>Rejoignez notre Communauté</h1>
        <p class="p">Inscrivez-vous à notre newsletter pour recevoir des recettes et des <br> conseils directement dans votre boîte mail.</p>
        <a href="../controllers/afficher_connexion.php" class="signup-button">📩 Inscrivez-vous maintenant</a>
</section>

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
