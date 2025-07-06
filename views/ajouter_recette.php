<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une recette</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Gabarito:wght@400..900&family=Manrope:wght@200..800&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Signika:wght@300..700&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">  
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=search"/>
    <link rel="manifest" href="/site.webmanifest">
    <link rel="icon" type="image/png" sizes="32x32" href="../images/android-chrome-512x512.png">
    <style>
        :root {
            --primary-color: #008080;
            --background-color: #f9f9f9;
            --text-color: #333;
            --border-radius: 5px;
            --box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            --category-font: "Montserrat", sans-serif;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: var(--background-color);
            color: var(--text-color);
            margin: 0;
            padding: 0;
        }

        .header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: var(--background-color);
    padding: 4px 20px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    position: sticky;
    top: 0;
    z-index: 1000;
    transition: background-color 0.3s;
}

.header.scrolled {
    background-color: var(--primary-color);
    color: white;
    border-radius: 10px;
}

.logo {
    flex: 1;
}

.logo form {
    margin: 0;
}

.btn-img-logo {
    background: none;
    border: none;
    cursor: pointer;
}

.btn-img-logo img {
    width: 60px;
    transition: transform 0.3s;
}

.btn-img-logo img:hover {
    transform: scale(1.1);
}

.nav-list {
    flex: 2;
    text-align: center;
    margin-left: -20px;
}

.nav-list nav ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    justify-content: center;
    gap: 30px;
    margin-left: -200px;
}

.nav-list nav ul li {
    margin: 0 15px;
    font-family: "Montserrat", serif;
    font-optical-sizing: auto;
    font-weight: weight;
    font-style: normal;
}

.nav-list nav ul li:hover {
    margin: 0 15px;
    transform: scale(1.1);
}

.nav-list nav ul li a {
    font-size: 0.85em;
    text-decoration: none;
    color: var(--text-color);
    font-weight: bold;
    transition: color 0.3s;
}

.nav-list nav ul li a:hover {
    color: var(--primary-color);
    text-decoration: underline;
    transform: translateY(-2px);
}

.connexion {
    flex: 1;
    text-align: right;
    display: flex;
    align-items: center;
    margin-left: -20px;
}

.connexion p {
    margin: 0 10px 0 0;
    display: flex;
    align-items: center;
    font-weight: bold;
    color: black;
    margin-left: 20px;
    font-size: 1em;
    font-family: "Manrope", sans-serif;
}

.connexion p:hover {
    background-color: rgba(58, 62, 62, 0.151);
    border: 1px solid transparent;
    border-radius: 20px;
    padding: 5px;
    font-size: 1em;
}

.connexion span {
    margin-left: 10px;
}

.connexion span:hover {
    margin-left: 8px;
}

.connexion form {
    display: inline;
}

.btn-co {
    font-size: 0.82em;
}

.connexion button {
    background-color: #008080b6;
    color: white;
    border: none;
    padding: 15px 30px;
    cursor: pointer;
    border-radius: 23px;
    margin-left: 40px;
    transition: background-color 0.3s;
}

.connexion button:hover {
    background-color: white;
    border: 1 px solid #005959;
    color: #333;
    transform: scale(1.05);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

.connecter {
    margin-left: 140px;
}

.search-container {
    display: flex;
    align-items: center;
    border: 1px solid var(--primary-color);
    border-radius: var(--border-radius);
    padding: 3px; /* Réduit le padding */
    background-color: var(--background-color);
    box-shadow: var(--box-shadow);
    transition: box-shadow 0.3s;
    position: absolute; /* Positionnement absolu */
    left: 820px; /* Déplace vers la gauche */
}

.search-container:hover {
    transform: scale(1.05);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

.search-container input[type="text"] {
    border: none;
    outline: none;
    padding: 5px;
    font-size: 14px; /* Réduit la taille de la police */
    width: 150px; /* Réduit la largeur */
    background-color: var(--background-color);
    color: var(--text-color);
    font-family: var(--category-font);
    transition: background-color 0.3s;
}

.search-container input[type="text"]:focus {
    background-color: #fff;
}

.search-container button {
    border: none;
    outline: none;
    background-color:#008080b6;
    color: #fff;
    padding: 5px;
    font-size: 14px;
    cursor: pointer;
    border-radius: var(--border-radius);
    margin-left: 5px;
    transition: background-color 0.3s;
}

.search-container button:hover {
    background-color: white;
}

.search-container button span {
    margin-left: 4px;
}

.search-container button span:hover {
    margin-left: 4px;
}


        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: var(--box-shadow);
            width: 400px;
            margin: 50px auto;
        }

        h2 {
            text-align: center;
            color: var(--primary-color);
        }

        label {
            font-weight: bold;
        }

        input, textarea, select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .button {
            background: var(--primary-color);
            color: white;
            padding: 10px;
            border: none;
            width: 100%;
            border-radius: 10px;
            cursor: pointer;
        }

        .button:hover {
            background: #005959;
        }

        .footer {
    background-color: var(--primary-color);
    color: #fff;
    padding: 40px 20px;
    text-align: center;
}

.footer-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    gap: 20px;
    margin-bottom: 20px;
}

.footer-section {
    flex: 1;
    min-width: 200px;
}

.footer-section h3 {
    margin-bottom: 20px;
    font-size: 1.5em;
}

.footer-section ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-section ul li {
    margin-bottom: 10px;
}

.footer-section ul li a {
    color: #fff;
    text-decoration: none;
    transition: color 0.3s;
    font-family: 'Roboto', sans-serif;
}

.footer-section ul li a:hover {
    color: var(--hover-color);
}

.footer-bottom {
    border-top: 1px solid #fff;
    padding-top: 20px;
    margin-top: 20px;
}

.footer-bottom p {
    margin: 0;
    font-size: 0.9em;
    color: #fff;
}

/* Media queries pour ajuster le pied de page en fonction de la taille de l'écran */
@media (max-width: 900px) {
    .footer-container {
        flex-direction: column;
        align-items: center;
    }

    .footer-section {
        text-align: center;
    }
}
    </style>
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
                    echo $affichage;
                }
            ?>
        </div>
    </div>

    <div class="container">
        <h2>Ajouter une recette</h2>
        <form action="../controllers/ajouter.php" method="POST" enctype="multipart/form-data">
            <label>Nom du plat :</label>
            <input type="text" name="nom" required>

            <label>Description :</label>
            <textarea name="description" required></textarea>

            <label>Préparation :</label>
            <textarea name="preparation" required></textarea>

            <label>Ingrédients :</label>
            <textarea name="ingredients" required></textarea>

            <label>Image :</label>
            <input type="file" name="image" accept="image/*">

            <label>Temps de préparation (min) :</label>
            <input type="number" name="temps_preparation" required>

            <label>Temps de cuisson (min) :</label>
            <input type="number" name="temps_cuisson" required>

            <label>Temps total (min) :</label>
            <input type="number" name="temps_total" required>

            <label>Accessoires nécessaires :</label>
            <textarea name="accessoires"></textarea>

            <label>Pays :</label>
            <select name="pays" required>
                <option>France</option>
                <option>Italie</option>
                <option>Japon</option>
                <option>Pérou</option>
                <option>USA</option>
                <option>Inde</option>
                <option>Algérie</option>
                <option>Allemagne</option>
                <option>Togo</option>
                <option>Côte d'Ivoire</option>
            </select>

            <label>Catégorie :</label>
            <select name="categorie" required>
                <option>Plat Entrée</option>
                <option>Principal</option>
                <option>Vegan</option>
                <option>Sans Gluten</option>
                <option>Rapides</option>
                <option>Dessert</option>
                <option>Boissons</option>
                <option>Soupes</option>
            </select>

            <button type="submit" class="button">Ajouter la recette</button>
        </form>
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
