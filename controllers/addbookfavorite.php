<?php
require '../models/afficher_data.php';
require '../controllers/icone_connexion.php';
if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
$id_livre = $_POST["id"];
$table="livre";

if (isset($_SESSION['id'])) {
    $id_utilisateur = $_SESSION["id"] ;
    $statut = "Retirer des favoris";
    $action ="removebookfavorite.php";

addfavorite($id_livre,$id_utilisateur,$table);
$livres = getdata_livre($id_livre);

}else{
    $statut = "Ajouter aux favoris";
    $action ="addbookfavorite.php";
    $livres = getdata_livre($id_livre);
    $error_message ="vous n'êtes pas connecté, cliquez <a href='../controllers/afficher_connexion.php'>ici</a> pour vous connecter";
}

}
require '../views/livre.php';