<?php
require 'connexion.php';
/*Fonction pour selectioner les catégories*/
function afficher_categories_questions()
{
    global $db;

    $requete = $db->prepare("
        SELECT categorie_question.titre, categorie_question.description, categorie_question.image
        FROM categorie_question
    ");

    $requete->execute();
    return $requete->fetchAll();
}

/*Fonction pour selectioner une question avec ses propositions selon la catégorie*/
function afficher_plats_noms($categorie)
{
    global $db;

    $requete = $db->prepare("
        SELECT categorie_question.titre, questions.question, reponse_proposition.proposition, reponse_proposition.est_correcte
        FROM categorie_question
        JOIN questions ON categorie_question.id = questions.id_categorie
        JOIN reponse_proposition ON questions.id = reponse_proposition.id_question
        WHERE categorie_question.titre = :categorie
    ");

    $requete->execute([':categorie' => $categorie]);
    return $requete->fetchAll();
}

/*Fonction pour avoir le nombre total de question qui se trouve dans une catégorie de question*/
function nombre_questions($categorie)
{
    global $db;

    $requete = $db->prepare("
        SELECT COUNT(DISTINCT questions.id) AS total_questions
        FROM categorie_question
        JOIN questions ON categorie_question.id = questions.id_categorie
        WHERE categorie_question.titre = :categorie
    ");

    $requete->execute([':categorie' => $categorie]);
    $resultat = $requete->fetch();
    return $resultat['total_questions'];
}