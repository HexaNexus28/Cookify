<?php

require "../models/nos_recettes_cookify.php";

$pays_codes = [
    "France" => 1,
    "Italie" => 2,
    "Japon" => 3,
    "Pérou" => 4,
    "USA" => 5,
    "Inde" => 6,
    "Algérie" => 7,
    "Allemagne" => 8,
    "Togo" => 9,
    "Côte d'Ivoire" => 10
];

$categorie_codes = [
    "Plat Entrée" => 1,
    "Principal" => 2,
    "Vegan" => 3,
    "Sans Gluten" => 4,
    "Rapides" => 5,
    "Dessert" => 6,
    "Boissons" => 7,
    "Soupes" => 8
];

$titre = $_POST["nom"]; 
$description = $_POST["description"];
$preparation = $_POST["preparation"];
$ingredients = $_POST["ingredients"];
$image = !empty($_POST["image"]) ? $_POST["image"] : ""; 
$temps_preparation = $_POST["temps_preparation"];
$temps_cuisson = $_POST["temps_cuisson"];
$temps_total = $_POST["temps_total"];
$accessoires = $_POST["accessoires"]; 
$id_pays = !empty($_POST["pays"]) && isset($pays_codes[$_POST["pays"]]) ? $pays_codes[$_POST["pays"]] : ""; 
$id_categorie = !empty($_POST["categorie"]) && isset($categorie_codes[$_POST["categorie"]]) ? $categorie_codes[$_POST["categorie"]] : ""; 

$ajouter = ajouter_recette($titre, $description, $preparation, $image, $ingredients, $temps_preparation, $temps_cuisson, $temps_total, $accessoires, $id_pays, $id_categorie);

require "../controllers/afficher_page_categories_recettes_cookify.php";
