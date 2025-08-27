<?php
require './connexion.php';
function inserte_commentaire($id_recette, $id_utilisateur, $commentaire)
{
    global $db;
    $requete = $db->prepare("INSERT INTO commentaire (id_recette, id_utilisateur, contenu) VALUES (:id_recette, :id_utilisateur, :commentaire)");
    return $requete->execute(array(
        ":id_recette" => $id_recette,
        ":id_utilisateur" => $id_utilisateur,
        ":commentaire" => $commentaire
    ));
}

function afficher_commantaire($id_recette, $id_utilisateur)
{
    global $db;
    $requete = $db->prepare("SELECT commentaire.contenu, utilisateur.nom AS nom, utilisateur.prenom AS prenom FROM commentaire JOIN utilisateur ON commentaire.id_utilisateur = utilisateur.id WHERE id_recette = :id_recette AND id_utilisateur = :id_utilisateur");
    $requete->execute(array(
        ':id_recette' => $id_recette,
        ':id_utilisateur' => $id_utilisateur
    ));
    return $requete->fetchAll();
}

function recupcommentaire($id_recette)
{
    global $db;
    $requete = $db->prepare("SELECT commentaire.contenu AS commentaire, utilisateur.nom AS utilisateur FROM commentaire JOIN utilisateur ON commentaire.id_utilisateur = utilisateur.id WHERE commentaire.id_recette = :id_recette");
    $requete->execute(array(':id_recette' => $id_recette));
    return $requete->fetchAll();
}
?>