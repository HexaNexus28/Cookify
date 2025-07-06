<?php
require '../models/afficher_data.php';
require "../models/nos_recettes_cookify.php";
require "../controllers/icone_connexion.php";
$types = array(
    'Plats d\'Entrées Équilibrées' => 'entrees',
    'Desserts Sains' => 'desserts',
    'Soupes Réconfortantes' => 'soupes',
    'Plats principaux Sains' => 'principaux',
    'Recettes Sans Gluten' => 'sans_gluten',
    'Boissons Nourrissantes' => 'boissons'
);
if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
    $researched_item = $_POST["researched_item"] ?? null;
    
    
    if (isset($researched_item)) {
        $table = 'recette';
        $colonne = 'titre';
        $recettes_init = researchrec($researched_item,$colonne,$table);
        if(!isset($recettes_init)){
        echo'Rien n\'a été trouvé';
        }
    
        foreach ($recettes_init as &$recette) {
            $type = $recette['type'];
            $recette["repertoire"] =$types[$type];
        }
        $recettes = [];
        foreach ($recettes_init as $recette) {
        $repertoire = $recette["repertoire"];
        $recettes[$repertoire][] = $recette;
        }  
}

}
    $recettes = array();
        foreach ($types as $type => $repertoire) {
            $recettes[$repertoire] = afficher_recettes_alea($type);
        }


require "../views/accueil_cookify.php";
?>
