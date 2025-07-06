<?php 
require "../models/nos_recettes_cookify.php";
require "../controllers/icone_connexion.php";
$recettes_a_afficher = afficher_plats_noms("Soupes Réconfortantes") ;
$repertoire = "soupes";
require "../views/page_recettes_cookify.php";