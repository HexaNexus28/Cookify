<?php
session_start();
require '../models/mod_multi.php';
$id_utilisateur = $_SESSION["id"];
$pseudo = $_SESSION["pseudo"];
$session_code =  $_SESSION["session_code"] ;
$points = $_SESSION["points"];
$gamedata = getgamedata($session_code);
$creator_id = $gamedata["creator_id"];
$nombre_de_questions = getnombre_de_questions($session_code);
if (!isset($_SESSION["bonnes_reponses_consecutives"])){
    $_SESSION["bonnes_reponses_consecutives"] =0;
}
$id_session_jeu = getgamedata($session_code)["id"];

$points_base=1000;
$column= "reponse_total";
$table="session_jeu";
$affichage="";
if (!verifycolumn($column,$table)){
    addreponsetotalcolumn();
}
if ($_SERVER["REQUEST_METHOD"] == "GET" ) {
$proposition = $_GET["proposition"] ?? null;

if($proposition){
    updatereponsetotal($session_code);
    $affichage = "Oups, vous n'avez rien répondu ";
}else{
    $affichage = $_GET["affichage"] ?? null;
}
    
   require '../controllers/redirection.php';
  
}else if ($_SERVER["REQUEST_METHOD"] == "POST" ) {

    $proposition = $_POST["proposition"]?? null;
 if($proposition) {
    updatereponsetotal($session_code);
 }  
    
    $id_question = $_POST["id_question"] ?? null;
    $id_reponse_proposition =$id_question;

    deletequestion($id_question);

    insertreponse($id_question,$id_reponse_proposition,$id_utilisateur);

    $ids =getids($id_question);
    $id_session_question = $ids["sid"];
    $id_reponse_utilisateur =$ids["rid"];

    insertsessionreponse($id_reponse_utilisateur,$id_session_jeu,$id_session_question);

    $reponse_correcte = getpropositions($id_question)["est_correcte"];
    
    if ($reponse_correcte == $proposition) {
        $affichage = "<p style='color: green; font-weight: bold;'>🎉 Bien joué ! Votre réponse est correcte !</p>";
        $temps_reponse = time() - $_SESSION['start_time'];
        $points += $points_base * (($_SESSION['temps_limite'] - $temps_reponse) / $_SESSION['temps_limite']);
        $_SESSION['bonnes_reponses_consecutives']++;
        $badges = getbadges($points);
        
        foreach ($badges as $badge) {
            if($badge["critere_points"]==0){
                if($temps_reponse<=5)
                {
                    if($badge["nom"] =="Rapide comme l'éclair"){

                        $id_badge = $badge["id"];
                    }
                } elseif($_SESSION["bonnes_reponses_consecutives"]>=10)
                    {
                if($badge["nom"] =="Maître des recettes"){
                    $id_badge = $badge["id"];
                }
          
            }
           
            }else if($points == $badge["critere_points"])
            {
                $id_badge = $badge["id"];
            }
           
        }
        if(isset($id_badge)){
            addbadges ($id_badge, $id_utilisateur);
        }
       
        
    }else{
        $affichage = "<p style='color: red; font-weight: bold;'>❌ Oups ! Essayez encore la prochaine fois.</p>";
        $points += 0;
    }

    insertpoints($pseudo,$id_utilisateur,$id_session_jeu,$points);
   
  require '../controllers/redirection.php';
}

