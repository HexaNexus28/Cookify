<?php
require "../models/nos_pays_cookify.php";
$pays = afficher_pays();
require "../controllers/icone_connexion.php";
require "../views/page_afficher_pays.php";
