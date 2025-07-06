<?php
session_start();
require '../models/mod_multi.php';
if ($_SERVER["REQUEST_METHOD"] == "GET" ) {
  $affichage = $_GET["affichage"] ?? null;
}  
$session_code=$_SESSION["session_code"];


$gamedata = getgamedata($session_code);
$nombre_de_questions = getnombre_de_questions($session_code);

$totalPoints = $_SESSION['points'];
$progressChef = min(100, ($totalPoints / 5000) * 100);
$progressMaitre = min(100, ($totalPoints / 10000) * 100);

$id_utilisateur = $_SESSION["id"];
$id_session_jeu = $gamedata["id"];
$creator_id = $gamedata["creator_id"]; 

$players = getplayerdata($id_session_jeu);
$badges = afficherbadges($id_utilisateur);

if(getnombre_de_questions($session_code)>=10){
  reinitializenombrequestion($session_code);
  dropduplicate_questions();
  createduplicatetable();
}
 require '../views/page_multi_score.php';