<?php
require './connexion.php';
function afficher_pays()
{
  global $db;
  $requete = $db->prepare("
    SELECT *
    FROM pays
  ");
  $requete->execute();
  return $requete->fetchAll();
}
;