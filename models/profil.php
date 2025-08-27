<?php
require './connexion.php';
function getfavoris($id_utilisateur, $table)
{
    // Connexion à la base de données
    global $db;

    // Préparation de la requête
    $requete = $db->prepare("select {$table}.titre as titre  from {$table} join {$table}_favori on {$table}.id = {$table}_favori.id_{$table} where {$table}_favori.id_utilisateur = :id_utilisateur");

    // Exécution de la requête avec les paramètres
    $requete->execute(
        array(
            ':id_utilisateur' => $id_utilisateur
        )
    );

    // Retourner le résultat (ou false si aucun résultat)
    return $requete->fetchAll();
}
function userinfos($id_utilisateur)
{
    // Connexion à la base de données
    global $db;

    // Préparation de la requête
    $requete = $db->prepare("select nom, prenom, email from utilisateur 
     where id = :id_utilisateur");

    // Exécution de la requête avec les paramètres
    $requete->execute(
        array(
            ':id_utilisateur' => $id_utilisateur
        )
    );

    // Retourner le résultat (ou false si aucun résultat)
    return $requete->fetchAll();
}