<?php
function afficher_pays(){
  $db = new PDO("mysql:host=localhost;dbname=cookify", "root", "");
  $requete = $db->prepare("
    SELECT *
    FROM pays
  ");
  $requete->execute();    
  return $requete->fetchAll();
};