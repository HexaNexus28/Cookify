<?php
session_start();
$_SESSION["start_time"] = time();
$_SESSION['temps_limite'] = 10;
if (!isset($_SESSION["points"])){
$_SESSION["points"] = 0;}
if (!isset($_SESSION['audioPlayed'])) {
    $_SESSION['audioPlayed'] = true; 
  }
require '../models/mod_multi.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" ) {

if (isset($_GET["session_code"])) {

    $session_code = $_GET["session_code"]?? null;
    $_SESSION["session_code"] = $session_code;
   updategamestatus($session_code); 
}
if(verifycolumn("reponse_total","session_jeu")){
    reinitializereponsetotal($session_code);  
}

$gamedata = getgamedata($session_code);
$id_utilisateur = $_SESSION["id"];
$id_session_jeu = $gamedata["id"];}

$table= 'duplicate_questions';
$column = 'used';

createduplicatetable();
if(!verifycolumn($column,$table)){
    addusedcolumn($table);
}
if(!verifycolumn("nombre_de_questions","session_jeu")){
    addnombrequestioncolumn();
}
$nombre_de_questions = getnombre_de_questions($session_code);
$currentquestion = getcurrentquestion();

if($currentquestion){

$id_question = $currentquestion["id"];
$question = $currentquestion["question"];

}else{

    $questiondata = getquestion();
    $question= $questiondata ["question"];
    $id_question = $questiondata["id"];

}
$proposition = explode('.',getpropositions($id_question)["proposition"]  );
insertquestions($id_question,$id_session_jeu);

require '../views/page_jeu.php';