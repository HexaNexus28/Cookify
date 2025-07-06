<?php 
require "../models/nos_recettes_cookify.php";
require "../controllers/icone_connexion.php";
$recettes_a_afficher = afficher_plats_noms("Plats principaux Sains");
$repertoire = "principaux";
require "../views/page_recettes_cookify.php";