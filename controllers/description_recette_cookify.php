<?php
require "../models/afficher_recettes.php";
require "../controllers/icone_connexion.php";
$id = (int) $_POST["id"];
$recettePlat = recette_du_plat($id);
require "../views/recettes_description_cookify.php";
