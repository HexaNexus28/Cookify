<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recette de Salade de Quinoa</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Gabarito:wght@400..900&family=Manrope:wght@200..800&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Signika:wght@300..700&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">  
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=search"/>
    <link rel="manifest" href="/site.webmanifest">
    <link rel="icon" type="image/png" sizes="32x32" href="../images/android-chrome-512x512.png">
    <link rel="stylesheet" href="../styles/afficher_preparation.css">
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
                    <li><a href="../controllers/afficher_pays_cookify.php">Pays</a></li>
                    <li><a href="../controllers/afficher_cuisinotheque.php">Cuisinothèque</a></li>
                    <li><a href="../controllers/jouer_quiz.php">Jeu de quiz</a></li>
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

<?php if (!empty($preparation_recette)) : ?>
    <?php foreach ($preparation_recette as $recette) : ?>
        <div class="container">
            <h1><?= htmlspecialchars($recette["titre"]) ?></h1>
            <img class="recette-image" src="../images/recettes/<?= htmlspecialchars($repertoire) ?>/<?= htmlspecialchars($recette['image']) ?>" alt="<?= htmlspecialchars($recette['titre']) ?>" width="150px">

            <div class="ingredients">
                <h2>Ingrédients</h2>
                <ul>
                    <?php foreach (explode(",", $recette["ingredients"]) as $ingredient) : ?>
                        <li><?= htmlspecialchars(trim($ingredient)) ; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="ustensiles">
                <h2>Ustensiles</h2>
                <ul>
                    <?php foreach (explode(",", $recette["accessoires"]) as $accessoire) : ?>
                        <li><?= htmlspecialchars(trim($accessoire)) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="instructions">
                <h2>Instructions</h2>
                <ol>
                    <?php foreach (explode("/", $recette["preparation"]) as $etape) : ?>
                        <li><?= htmlspecialchars($etape) ?></li>
                    <?php endforeach; ?>
                </ol>
            </div>

            <div class="notes">
                <h2>Notes</h2>
                <p>Temps Préparation : <?= htmlspecialchars($recette["temps_preparation"]) ?><br>
                Temps Cuisson : <?= htmlspecialchars($recette["temps_cuisson"]) ?><br>
                Temps Total : <?= htmlspecialchars($recette["temps_total"]) ?></p>
            </div>
<button onclick="shareRecipe()">Partager la recette</button>
<p>
<form action="../controllers/<?= htmlspecialchars($action) ?>" method="post">
            <input type="hidden" name="repertoire" value="<?= htmlspecialchars($repertoire) ?>">
            <input type="hidden" name="id" value="<?= htmlspecialchars($id_recette) ?>">
            <button><?= htmlspecialchars($statut) ?></button>
        </form>
</p>


<?php
// Message d'erreur ou formulaire d'ajout de commentaire
if(!empty($error_message)){
    echo "<div class='comment-section'><p>$error_message</p></div>";
} 

if (!empty($envoyer)) {
    echo "<div class='comment-section comment-form'>$envoyer</div>"; 
}

// Affichage des commentaires
if(!empty($affichage_commentaire)){
    echo "<div class='comment-section'>";
    foreach ($affichage_commentaire as $commentaire ) {
        echo "<div class='comment'>
                <span class='utilisateur'>".htmlspecialchars($commentaire["utilisateur"]).":</span>
                <p>".htmlspecialchars($commentaire["commentaire"])."</p>
              </div>";
    }
    echo "</div>";
}
?>
  
    <?php endforeach; ?>
<?php endif; ?>

<script>
function shareRecipe() {
    if (navigator.share) {
        navigator.share({
            title: document.title,
            text: 'Découvrez cette délicieuse recette !',
            url: window.location.href
        }).catch((error) => console.error('Erreur de partage', error));
    } else {
        alert('Partage non supporté par votre navigateur.');
    }
}
</script>

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
