<?php 
require "../models/nos_recettes_cookify.php";
require "../controllers/icone_connexion.php";
$pays = $_POST["recette"];
$recettes_a_afficher = recettes_par_pays("$pays");
$repertoire = "pays";
require "../views/page_recettes_cookify.php";