<?php
session_start();

require "../models/jeu_quiz.php";

$compteur = $_SESSION['compteur'];
$categorie = $_SESSION['categorie'];

$message = "Question suivante !";

$compteur = $compteur + 1;
$_SESSION['compteur'] = $compteur;

$resultats = afficher_plats_noms($categorie);
$nombre_total_question = nombre_questions($categorie);

if ($compteur >= $nombre_total_question) {
    require "../controllers/afficher_page_score_solo.php";
    exit;
}

$question = $resultats[$compteur];

require "../views/page_solo_quiz_cookify.php";
?>
