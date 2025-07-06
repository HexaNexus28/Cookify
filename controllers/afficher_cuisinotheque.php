<?php
require '../models/afficher_data.php';
/*si il n'y a pas de recherche alors c'est la page normale de cuisinotheque qui est afficher */
require "../controllers/icone_connexion.php";
if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
    $researched_item = $_POST["researched_item"] ?? null;
    
    
if (isset($researched_item)) {
    $table = 'livre';
    $colonne = 'titre';
    $livres = research($researched_item,$colonne,$table);
    if(!isset($livres)){
        echo'Rien n\'a été trouvé';
    }
}else {
    $livres = getdata();
}
}else {
    $livres = getdata();}

require '../views/cuisinotheque.php';