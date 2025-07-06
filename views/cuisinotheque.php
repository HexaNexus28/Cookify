<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de la Cuisinothèque</title>

    <!-- Fonts et styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined&display=swap">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">

    <!-- Fichier CSS -->
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/cuisinotheque.css">
</head>

<body>
    <div class="header">
        <div class="logo">
            <form action="../controllers/afficher_cuisinotheque.php" method="POST">
                <input type="hidden" name="researched_item">
                <button class="btn-img-logo">
                    <img src="../images/logo_cookify.jpg" alt="logo-cookify" width="100px">
                </button>
            </form>
        </div>

        <div class="nav-list">
            <nav>
                <ul>
                    <li><a href="../controllers/afficher_page_accueil_cookify.php">Accueil</a></li>
                    <li><a href="../controllers/afficher_page_categories_recettes_cookify.php">Recettes</a></li>
                    <li><a href="#">Jeu de quiz</a></li>
                    <li><a href="#">À propos de nous</a></li>
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

    <header>Bienvenue sur la gestion de la cuisinothèque</header>

    <div class="search-container">
        <form action="../controllers/afficher_cuisinotheque.php" method="post" class="search-form">
            <div class="search-input-wrapper">
                <button type="submit" class="search-icon">🔍</button>
                <input type="text" name="researched_item" id="searchInput" placeholder="Entrez un titre..."
                    class="search-input">
            </div>
        </form>
    </div>

    <div class="book-container">
        <?php
        echo array_reduce($livres, function ($html, $livre) {
            static $index = 0;
            $index++;
            return $html . '
            <div class="book fade-in" style="--index: ' . $index . ';">
                <form action="../controllers/Afficher_livre.php" method="post">
                    <input type="hidden" name="id" value="' . $livre["id"] . '">
                    <div class="book-image">
                        <img src="' . $livre["lien_image"] . '" alt="Image du livre" width="100" height="120">
                    </div>
                    <div class="book-details">
                        <div class="book-title">' . $livre["titre"] . '</div>
                        <button type="submit" class="view-btn">Voir le livre</button>
                    </div>
                </form>
            </div>';
        }, '');
        ?>
    </div>
</body>

</html>
