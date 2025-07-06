<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=arrow_forward"/>
    <link rel="stylesheet" href="../styles/livre.css">
    <title>Cuisinothèque</title>
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
                    <li><a href="">Jeu de quiz</a></li>
                    <li><a href="">À propos de nous</a></li>
                </ul>
            </nav>
        </div>

        <div class="connexion">
            <p>
                Join us <span class="material-symbols-outlined">arrow_forward</span>
            </p>
            <?php echo !empty($affichage) ? $affichage : ''; ?>
        </div>
    </div>

    <div class="main-content">
        <p>Bienvenue sur la gestion de la cuisinothèque</p>
        <form action="../controllers/afficher_cuisinotheque.php" method="post">
            <input type="text" name="researched_item" placeholder="Rechercher un livre...">
            <button>Rechercher</button>
        </form>

        <br>

        <div class="book-container">
            <?php
            echo !empty($error_message) ? '<p class="error-message">' . $error_message . '</p>' : '';

            foreach ($livres as $livre) {
                echo '
                <div class="book">
                    <div class="image">
                        <img src="' . $livre['lien_image'] . '" alt="Image du livre" width="100" height="120">
                    </div>
                    <div class="details">
                        <h3 class="title">Titre : ' . $livre['titre'] . '</h3>
                        <p>Auteur : ' . $livre['auteur'] . '</p>
                        <p>Nombre de pages : ' . $livre['nombre_page'] . '</p>
                        <p>Année de publication : ' . $livre['annee_publication'] . '</p>
                        <p>Résumé : ' . $livre['resume'] . '</p>
                        <a href="' . $livre['lien_telecharger'] . '" target="_blank" class="download-link">Télécharger</a>
                    </div>
                    <form action="../controllers/' . $action . '" method="post">
                        <input type="hidden" name="id" value="' . $livre['id'] . '">
                        <button class="action-btn">' . $statut . '</button>
                    </form>
                </div>';
            }
            ?>
        </div>

        <div class="retour">
            <a href="../controllers/afficher_cuisinotheque.php">Retour</a>
        </div>
    </div>
</body>
</html>
