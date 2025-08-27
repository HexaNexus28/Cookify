<?php
require './connexion.php';
/*La première fonction permet d'afficher le plat et la description*/
function afficherRecettes()
{
    global $db;
    $requete = $db->prepare("
               SELECT recette.nom AS nom_recette, recette.image AS recette_image, recette.description AS description_recette, id
               FROM recette;
            ");
    $requete->execute();
    return $requete->fetchAll();
}

/*Cette fonction affiche la recette du plat sélectionné*/
function recette_du_plat($id)
{
    global $db;
    $requete = $db->prepare("
                   SELECT * 
                   FROM recette
                   WHERE id = :id
                ");
    $requete->execute(array(
        ":id" => $id
    ));
    return $requete->fetchAll();
}
