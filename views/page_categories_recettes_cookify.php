<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Découvrez nos catégories</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Gabarito:wght@400..900&family=Manrope:wght@200..800&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Signika:wght@300..700&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=search" />
    <link rel="stylesheet" href="../styles/categories.css">
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
                    <li><a href="../controllers/afficher_page_accueil_cookify.php">Accueil</a></li>
                    <li><a href="../controllers/afficher_pays_cookify.php">Pays</a></li>
                    <li><a href="../controllers/afficher_cuisinotheque.php">Cuisinothèque</a></li>
                    <li><a href="">Jeu de quiz</a></li>
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
            }?>
        </div>
    </div>

    <div class="titre">
        <h1>
            <span class="first-line">Découvrez Nos</span><br>
            <span class="second-line">Recettes Équilibrées</span>
        </h1>
        <p>
            Plongez dans un monde de saveurs saines et délicieuses pour maintenir votre bien-être.
        </p>
    </div>

    <div class="menu-categories">
        <h2>Explorez Nos Catégories</h2>
        <p>
            Sélectionnez parmi notre large gamme d'offres créatives
        </p>
        <div class="categories">
            <form action="../controllers/afficher_recettes_entrees.php" method="POST">
                <button>
                    <p>
                        <img src="../images/plat_entree.jpg" alt="Plats d'Entrées Équilibrées">
                    </p>
                    <h3>
                        Plats d'Entrées Équilibrées
                    </h3>
                </button>
            </form>
            <form action="../controllers/afficher_recettes_principaux.php" method="POST">
                <button>
                    <p>
                        <img src="../images/plat_principaux.jpg" alt="Plats Principaux Sains">
                    </p>
                    <h3>
                        Plats Principaux Sains
                    </h3>
                </button>
            </form>
            <form action="../controllers/afficher_recettes_vegetarien.php" method="POST">
                <button>
                    <p>
                        <img src="../images/vegan.jpg" alt="Plats Végétariens">
                    </p>
                    <h3>
                        Plats Végétariens
                    </h3>
                </button>
            </form>
            <form action="../controllers/afficher_recettes_sans_glutten.php" method="POST">
                <button>
                    <p>
                        <img src="../images/plat_sans_gluten.jpg" alt="Recettes Sans Gluten">
                    </p>
                    <h3>
                        Recettes Sans Gluten
                    </h3>
                </button>
            </form>
            <form action="../controllers/afficher_recettes_repas_rapides.php" method="POST">
                <button>
                    <p>
                        <img src="../images/plat_rapide.jpg" alt="Repas Rapides">
                    </p>
                    <h3>
                        Repas Rapides
                    </h3>
                </button>
            </form>
            <form action="../controllers/afficher_recettes_desserts.php" method="POST">
                <button>
                    <p>
                        <img src="../images/dessert.jpg" alt="Desserts Sains">
                    </p>
                    <h3>
                        Desserts Sains
                    </h3>
                </button>
            </form>
            <form action="../controllers/afficher_recettes_boissons.php" method="POST">
                <button>
                    <p>
                        <img src="../images/boisson.jpg" alt="Boissons Nourrissantes">
                    </p>
                    <h3>
                        Boissons Nourrissantes
                    </h3>
                </button>
            </form>
            <form action="../controllers/afficher_recettes_soupe_reconfortant.php" method="POST">
                <button>
                    <p>
                        <img src="../images/soupe.jpg" alt="Soupes Réconfortantes">
                    </p>
                    <h3>
                        Soupes Réconfortantes
                    </h3>
                </button>
            </form>
            <form action="../controllers/afficher_ajouter_recette.php" method="POST">
                <button>
                    <p>
                        <img src="../images/recettes/pays/ajouter.png" alt="Plats Végétariens">
                    </p>
                    <h3>
                        Ajoutez une recette
                    </h3>
                </button>
            </form>
        </div>
    </div>

    <div class="process-section">
    <div class="text-block">
        <h3>Préparer facilement</h3>
        <h2>Un Processus Simplifié</h2>
        <p>Suivez nos instructions pas à pas pour créer des plats équilibrés en toute simplicité.</p>
        <p>Chaque recette est conçue pour être nutritive et facile à réaliser, vous aidant à rester en bonne santé.</p>
        <div class="benefits">
            <div class="benefit">
                <h3>🍴 Ingrédients Simples</h3>
                <p>Des ingrédients faciles à trouver pour des repas délicieux et <br> équilibrés.</p>
            </div>
            <div class="benefit">
                <h3>🩺 Bénéfices Santé</h3>
                <p>Des recettes conçues pour améliorer votre bien-être <br> général.</p>
            </div>
            <div class="benefit">
                <h3>🕒 Options Durables</h3>
                <p>Des choix respectueux de l'environnement pour une <br> alimentation responsable.</p>
            </div>
        </div>
    </div>
    <div class="image-block">
        <img src="../images/prec.jpg" alt="Repas équilibré">
    </div>
</div>
<section class="stats-section">
        <div class="stats-container">
            <div class="stats-text">
                <h2>Nos Recettes en Chiffres</h2>
                <p>Découvrez l'impact de nos recettes sur votre  <br> santé et votre bien-être.</p>
            </div>
            <div class="stats-grid">
    <div class="stat-item">
        <h3>100+</h3>
        <p>Recettes Disponibles</p>
    </div>
    <div class="stat-item">
        <h3>95%</h3>
        <p>Taux de Satisfaction</p>
    </div>
    <div class="stat-item">
        <h3>10+</h3>
        <p>Utilisateurs</p>
    </div>
    <div class="stat-item">
        <h3>4.8/5</h3>
        <p>Note Moyenne</p>
    </div>
</div>
        </div>
    </section>

    <section class="faq-section">
        <div class="faq-container">
            <div class="faq-header">
                <h1>Questions Fréquentes</h1>
                <p>Trouvez des réponses à vos questions sur nos recettes et notre approche <br> santé.</p>
            </div>

            <div class="faq-list">
                <div class="faq-item">
                    <h3>Comment puis-je trouver des recettes sans gluten ?</h3>
                    <p>Utilisez notre filtre de catégories pour explorer toutes nos recettes sans gluten.</p>
                </div>

                <div class="faq-item">
                    <h3>Les recettes sont-elles adaptées aux débutants ?</h3>
                    <p>Oui, chaque recette est accompagnée d'instructions claires pour les cuisiniers de tous niveaux.</p>
                </div>

                <div class="faq-item">
                    <h3>Puis-je soumettre mes propres recettes ?</h3>
                    <p>Nous encourageons les contributions de nos utilisateurs. Contactez-nous pour partager vos créations !</p>
                </div>
            </div>
        </div>
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
