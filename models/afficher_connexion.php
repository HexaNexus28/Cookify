<?php
require './connexion.php';
function getdonnees($email, $mot_de_passe)
{
    // Connexion à la base de données
    global $db;
    // Préparation de la requête
    $requete = $db->prepare("SELECT id, email, mot_de_passe FROM utilisateur WHERE email = :email AND mot_de_passe = :mot_de_passe");
    // Exécution avec les paramètres fournis
    $requete->execute(array(
        ':email' => $email,
        ':mot_de_passe' => $mot_de_passe
    ));
    // Retourner le résultat (ou false si aucun résultat)
    return $requete->fetch();
}