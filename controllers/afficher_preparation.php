<?php
require '../models/addcommentaire.php';
require '../controllers/icone_connexion.php';
require_once '../models/nos_recettes_cookify.php';
$error_message = '';
$envoyer= '';
if(!isset($remove)){
    $remove = false;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_recette = $_POST["id"] ?? null;
    $repertoire = $_POST["repertoire"] ?? null;
    $commentaire = $_POST["commentaire"] ?? null;
    $table = "recette";
$statut="";

    

    if (isset($_SESSION["id"])) {

        $id_utilisateur = $_SESSION["id"];
        if ($commentaire) {
            inserte_commentaire($id_recette, $id_utilisateur, $commentaire);
                }
        $envoyer= '
        <form action="../controllers/afficher_preparation.php" method="post">
            <input type="hidden" name="repertoire" value="' .$repertoire. '">
            <input type="hidden" name="id" value="' .$id_recette. '">
            <textarea name="commentaire" cols="30" rows="10" placeholder="Ajouter un commentaire"></textarea><br>
            <input type="submit" value="Envoyer">
        </form>';
        if($remove){
        $id_utilisateur = $_SESSION["id"];
        $statut = "Retirer des favoris";
        $action = "removerecettefavorite.php";

        } 
        else
         {
        $statut = "Ajouter aux favoris";
        $action = "addrecettefavorite.php";
       
        }
    }else{ $error_message = "Connectez-vous avant d'ajouter un commentaire <a href='../controllers/afficher_connexion.php'>cliquez ici</a>pour vous connecter";
    }
    $preparation_recette = recette_du_plat($id_recette);
    $affichage_commentaire = recupcommentaire($id_recette);
}


require '../views/page_preparation_recettes.php';
?>
