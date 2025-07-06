<?php
session_start();
if (!isset($_SESSION['audioPlayed'])) {
  $_SESSION['audioPlayed'] = true; 
}

require '../models/mod_multi.php';

if(!isset($_SESSION["id"])){
  $affichage = 'Vous n\'êtes pas connecté, cliquez <a href "../controllers/afficher_connexion.php">ici</a> pour vous connecter';
}else{
  $session_code = generatecode();
$id_utilisateur = $_SESSION["id"];
$_SESSION["session_code"] = $session_code;
  insertgamedata($session_code,$id_utilisateur);
}

require '../views/page_pseudo.php';
