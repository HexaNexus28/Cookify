<?php
session_start();
require "../models/afficher_connexion.php";
require "../models/profil.php";

$error_message = ""; // Variable pour le message d'erreur

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données depuis le formulaire
    $email = $_POST['email'] ?? null;
    $mot_de_passe = $_POST['mot_de_passe'] ?? null;

    // Appel de la fonction pour vérifier les données
    $users = getdonnees($email, $mot_de_passe);
    // Vérifier si un utilisateur est trouvé
    if ($users) {
        $id_utilisateur = $users["id"];
        $_SESSION['id'] = $id_utilisateur;
        $_SESSION['email'] = $email;
        $_SESSION['mot_de_passe'] = $mot_de_passe;
        $users = userinfos($id_utilisateur);
        $favorislivre = getfavoris($id_utilisateur,"livre");
        $favorisrecette = getfavoris($id_utilisateur,"recette");
        // Si les informations sont correctes, afficher la page du profil
        require "../views/afficher_profil.php";
    } else {
        // Sinon, rester sur la page de connexion avec un message d'erreur
        $error_message = "Identifiant ou mot de passe incorrect;";
        require "../views/afficher_connexion.php";
    }
}
?>
