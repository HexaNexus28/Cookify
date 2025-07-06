<?php

require '../models/afficher_data.php';
require "../controllers/icone_connexion.php";

$id_utilisateur =0;
if (isset($_SESSION["id"])) {
    $id_utilisateur = $_SESSION["id"];
}
if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
    $id_livre = $_POST["id"];
    $table="livre";
    $statut = "";
    $action ="";
    $livres = getdata_livre($id_livre);
    
    $isfavorite = isfavorite($id_livre,$id_utilisateur,$table);
    
    if($isfavorite){
        $statut = "Retirer des favoris";
       $action = "removebookfavorite.php";
    }else {
        $statut = "Ajouter aux favoris";
       $action ="addbookfavorite.php";
    }
    
}
require '../views/livre.php';
