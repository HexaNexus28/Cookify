<?php
session_start(); 

require "../models/jeu_quiz.php";

$categorie = $_POST['categorie'];
$resultats = afficher_plats_noms($categorie);
$nombre_total_question = nombre_questions($categorie);
$compteur = 0;
$score = 0;
$etoile = array();
$question = $resultats[$compteur];
$message = "Début de la partie !";


$_SESSION['categorie'] = $categorie;
$_SESSION['compteur'] = $compteur;
$_SESSION['score'] = $score;
$_SESSION['etoile'] = $etoile;

require "../views/page_solo_quiz_cookify.php";
?>
