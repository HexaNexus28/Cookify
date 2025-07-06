<?php
session_start();

require '../models/mod_multi.php';


if ($_SERVER["REQUEST_METHOD"] == "GET" ) {

    if (isset($_GET["session_code"])) {

        $session_code = $_GET["session_code"];
        $gamedata = getgamedata($session_code);
    }

    $id_utilisateur = $_SESSION["id"];
    $id_session_jeu = $gamedata["id"];
    $creator_id = $gamedata["creator_id"]; 
    $status = $gamedata["status"];

    if($status == "prete") {
        header("Location: ../controllers/commencer_partie.php?session_code=".$session_code."");
        exit();
    }
    else {

    $pseudo = $_GET["pseudo"] ?? null;
    
$_SESSION["pseudo"] = $pseudo;
    if ($pseudo && $session_code) {

        $playersdata = getplayerdata($id_session_jeu); 
        $list_pseudo = array_column($playersdata,'pseudo');
        if(!in_array($pseudo,$list_pseudo)&& $pseudo){
            insertplayerdata($pseudo,$id_utilisateur,$id_session_jeu);
        }
        $playersdata = getplayerdata($id_session_jeu);  
    }
    
}
}

if (count($playersdata)>=2 && $creator_id == $id_utilisateur ) {
    $affichage ='<form action="../controllers/commencer_partie.php" method="get"><input type="hidden" name="session_code" value='."$session_code".' >
    <button type="submit">Commencer la partie</button></form>';  

}
require '../views/page_attente.php';

