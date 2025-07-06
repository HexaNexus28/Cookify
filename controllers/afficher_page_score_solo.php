<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once "../models/jeu_quiz.php";

$categorie = $_SESSION['categorie'];
$score = $_SESSION['score'];
$etoile = $_SESSION["etoile"];
$message = "";

if(count($_SESSION["etoile"]) == 1) {
    $message = "Vous êtes sur la bonne voie ! Continuez à cuisiner et à apprendre.";
} else if (count($_SESSION["etoile"]) == 2) {
    $message = "Pas mal du tout ! Continuez à cuisiner et à apprendre.";
} else if (count($_SESSION["etoile"]) == 3) {
    $message = "Vous mépatez carrément ! Continuez à cuisiner et à apprendre.";
} else if (count($_SESSION["etoile"]) == 4) {
    $message = "Vous êtes un véritable chef en herbe ! Continuez à cuisiner et à apprendre.";
} else if (count($_SESSION["etoile"]) == 5) {
    $message = "Alors là Je n'est rien à ajouter. Vous êtes un vrai chef né !";
}
 else {
    $message = "Nous somme désolé ! Pour suivre une formation de cuisine ça fais 2300€";
}

$nombre_total_question = nombre_questions($categorie);

require_once "../views/page_score.php";

