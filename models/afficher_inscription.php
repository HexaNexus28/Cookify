<?php
require './connexion.php';
function insertdonnee($nom, $prenom, $email, $mot_de_passe)
{
    global $db;
    $requete = $db->prepare("INSERT INTO utilisateur (nom, prenom, email, mot_de_passe) VALUES (:nom, :prenom, :email, :mot_de_passe)");
    $requete->execute(array(
        ':nom' => $nom,
        ':prenom' => $prenom,
        ':email' => $email,
        ':mot_de_passe' => $mot_de_passe
    ));
}