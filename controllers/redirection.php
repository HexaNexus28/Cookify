<?php

$numbers_of_players = getplayersnumbers($id_session_jeu)["numberofplayers"];

$answeredplayersnumbers = getansweredplayersnumbers($session_code)["reponse_total"];  
var_dump($numbers_of_players, $answeredplayersnumbers);
if ($numbers_of_players <= $answeredplayersnumbers ) {
  if($id_utilisateur == $creator_id){
    updatenombrequestion($session_code);
  } // ajoute le nombre de questions globale une fois;
 header("Location: ../controllers/afficher_multi_score.php?affichage=".$affichage);
 exit();
} else {
 
header("Location: ../views/page_attente_reponse.php?affichage=".$affichage);
exit();
}