<?php
/*Cette fonction affiche par rapport au type de catégories*/      
function afficher_plats_noms($type){
  $db = new PDO("mysql:host=localhost;dbname=cookify", "root", "");
  $requete = $db->prepare("
    SELECT recette.*
    FROM recette
    JOIN type ON recette.id_type = type.id
    WHERE type.nom = :type;
  ");
  $requete->execute(array(":type"=>$type));    
  return $requete->fetchAll();
};

/*Cette fonction affiche la recette du plat sélectionné*/      
function recette_du_plat($id) {
  $db = new PDO("mysql:host=localhost;dbname=cookify", "root", "");
  $requete = $db->prepare("
    SELECT * 
    FROM recette
    WHERE id = :id
  ");
  $requete->execute(array(":id" => $id));
  return $requete->fetchAll();
};

/*Cette fonction affiche 2 recettes aléa par rapport au type de catégorie*/      
function afficher_recettes_alea($type) {
  $db = new PDO("mysql:host=localhost;dbname=cookify", "root", "");
  $requete = $db->prepare("
      SELECT recette.*
      FROM recette
      JOIN type ON recette.id_type = type.id
      WHERE type.nom = :type
      ORDER BY RAND()
      LIMIT 2;
  ");
  $requete->execute(array(':type' => $type));
  return $requete->fetchAll();
};
function afficher_recettes($type) {
  $db = new PDO("mysql:host=localhost;dbname=cookify", "root", "");
  $requete = $db->prepare("
      SELECT recette.*
      FROM recette
      JOIN type ON recette.id_type = type.id
      WHERE type.nom = :type 
  ");
  $requete->execute(array(':type' => $type));
  return $requete->fetchAll();
};

/* Cette fonction affiche les recettes d'un pays sélectionné */
function recettes_par_pays($id_pays) {
  $db = new PDO("mysql:host=localhost;dbname=cookify", "root", "");
  $requete = $db->prepare("
      SELECT recette.*
      FROM recette
      WHERE recette.id_pays = :id_pays
  ");
  $requete->execute(array(":id_pays" => $id_pays));
  return $requete->fetchAll();
}

// fonction pour insérer une recette 
function ajouter_recette($titre, $description, $preparation, $image, $ingredients, $temps_preparation, $temps_cuisson, $temps_total, $accessoires, $id_pays, $id_categorie) {
      $db = new PDO("mysql:host=localhost;dbname=cookify;charset=utf8", "root", "",);
      $requete = $db->prepare("INSERT INTO recette (titre, description, preparation, image, ingredients, temps_preparation, temps_cuisson, temps_total, accessoires, id_pays, id_type) 
      VALUES (:titre, :description, :preparation, :image, :ingredients, :temps_preparation, :temps_cuisson, :temps_total, :accessoires, :id_pays, :id_type)");
      $requete->execute([
          ':titre' => $titre,
          ':description' => $description,
          ':preparation' => $preparation,
          ':image' => $image,
          ':ingredients' => $ingredients,
          ':temps_preparation' => $temps_preparation,
          ':temps_cuisson' => $temps_cuisson,
          ':temps_total' => $temps_total,
          ':accessoires' => $accessoires,
          ':id_pays' => $id_pays,
          ':id_type' => $id_categorie
      ]);
}

   