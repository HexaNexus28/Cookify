<?php

require '../models/afficher_data.php';
require "../controllers/icone_connexion.php";
$id_utilisateur = $_SESSION["id"];
if ($_SERVER["REQUEST_METHOD"] == "POST" ) {

$id_livre = $_POST["id"];
$table="livre";

$statut = "Ajouter aux favoris";
$action ="addbookfavorite.php";

 removefavorite($id_livre,$id_utilisateur,$table);
 $livres = getdata_livre($id_livre);
}
require '../views/livre.php';