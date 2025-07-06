<?php

require_once "../models/nos_recettes_cookify.php";
require '../models/afficher_data.php';
require "../controllers/icone_connexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
    $id_utilisateur = $_SESSION["id"];
$id_recette = $_POST["id"];
$repertoire = $_POST["repertoire"];
$table="recette";
$remove = true;


addfavorite($id_recette,$id_utilisateur,$table);
$preparation_recette = recette_du_plat($id_recette);

require "../controllers/afficher_preparation.php";
}