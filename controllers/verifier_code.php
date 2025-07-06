<?php
session_start();
require '../models/mod_multi.php';


if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
    $code = $_POST["code"] ?? null;
   $data = getgamedata($code);
   $session_code = $data['session_code']?? null;

    if ($session_code) {
require '../views/page_pseudo.php';
    }
else{
    $affichage = 'ce code ne correspond à aucune partie en cours';
    require '../views/rejoindre_partie.php';
    
}
}