<?php
session_start();

require "../models/jeu_quiz.php";

$compteur = $_SESSION['compteur'];
$categorie = $_SESSION['categorie'];
$score = $_SESSION['score'];
$etoile = $_SESSION['etoile'];

$reponse_correcte = $_POST['correcte'];
$reponse_utilisateur = $_POST['reponse'];
$temps_restant = intval($_POST['temps_restant']); 

if ($reponse_correcte == $reponse_utilisateur) {
    $message = "Réponse correcte 😊";
    $couleur_boutton = "correct";
    $score = $score + 1;
    $ajout = "../images/jeu_quiz/etoile.png";
    if (!is_array($etoile)) {
        $etoile = [];
    }
    array_push($etoile, $ajout);
    $_SESSION['score'] = $score;
    $_SESSION['etoile'] = $etoile;
} else {
    $message = "Mauvaise réponse 🥲";
    $couleur_boutton = "incorrect";
}

$resultats = afficher_plats_noms($categorie);
$nombre_total_question = nombre_questions($categorie);

$question = $resultats[$compteur];

require "../views/page_verification_game.php";
?>
