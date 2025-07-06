<?php
session_start();

require "../models/jeu_quiz.php";

$compteur = $_SESSION['compteur'];
$categorie = $_SESSION['categorie'];

$reponse_correcte = "";
$reponse_utilisateur = "";
$temps_restant = 0;

$message = "Oups temps écoulé !";

$resultats = afficher_plats_noms($categorie);
$nombre_total_question = nombre_questions($categorie);

$question = $resultats[$compteur];

require "../views/page_verification_game.php";
?>
