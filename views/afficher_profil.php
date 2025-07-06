<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Utilisateur</title>
    <link rel="stylesheet" href="../styles/afficher_profil.css">
</head>

<body>
    <div class="container">
        <header>
            <h1>Bienvenue sur votre profil</h1>
        </header>

        <section class="user-info">
            <?php
            foreach ($users as $donnee) {
                echo "<p><strong>Nom :</strong> " . $donnee['nom'] . "</p>";
                echo "<p><strong>Prénom :</strong> " . $donnee['prenom'] . "</p>";
                echo "<p><strong>Email :</strong> " . $donnee['email'] . "</p>";
            }
            ?>
        </section>

        <section class="favorites">
            <div class="favorite-recipes">
                <h2>Recettes Favorites</h2>
                <?php
                if (!isset($favorisrecette)) {
                    echo '<p>Aucune recette favorite</p>';
                } else {
                    foreach ($favorisrecette as $donnee) {
                        echo "<div class='favorite-item'>" . $donnee['titre'] . "</div>";
                    }
                }
                ?>
            </div>

            <div class="favorite-books">
                <h2>Livres Favoris</h2>
                <?php
                if (!isset($favorislivre)) {
                    echo '<p>Aucun livre favori</p>';
                } else {
                    foreach ($favorislivre as $donnee) {
                        echo "<div class='favorite-item'>" . $donnee['titre'] . "</div>";
                    }
                }
                ?>
            </div>
        </section>

        <div class="actions">
            <button class="btn"><a href="../controllers/afficher_page_accueil_cookify.php">Retour vers l'accueil</a></button>
            <form action="../controllers/afficher_page_accueil_cookify.php" method="post" class="logout-form">
                <input type="submit" name="Deconnexion" value="Déconnexion" class="btn logout-btn">
            </form>
        </div>
    </div>
</body>
</html>
