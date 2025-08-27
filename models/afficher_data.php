<?php
require './connexion.php';
/*ici les deux premieres fonctions sont urilisées dans le controlleur afficher_cuisinotheque, le troisième dans afficher_livre  */
function getdata()
{
    global $db;
    $requete = $db->prepare('select id, titre, lien_image from livre order by titre asc');
    $requete->execute();
    return $requete->fetchAll();
}
/*A faire : il faut permettre à l'user de chercher l'auteur,  aussi*/
function research($item, $colonne, $table)
{

    global $db;
    $item = '%' . $item . '%';
    $requete = $db->prepare('select * from ' . $table . ' where ' . $colonne . ' like :item order by ' . $colonne . ' asc');
    $requete->execute(
        array(':item' => $item)
    );
    return $requete->fetchAll();
}
function researchrec($item, $colonne, $table)
{

    global $db;
    $item = '%' . $item . '%';
    $requete = $db->prepare('select * from ' . $table . ' join type on ' . $table . '.id_type = type.id where ' . $table . '.' . $colonne . ' like :item order by ' . $colonne . ' asc');
    $requete->execute(
        array(':item' => $item)
    );
    return $requete->fetchAll();
}
function getdata_livre($id)
{
    global $db;
    $requete = $db->prepare('select * from livre where id = :id ');
    $requete->execute(array(':id' => $id));
    return $requete->fetchAll();
}

function addfavorite($id1, $id2, $table)
{
    global $db;

    $requete = $db->prepare('insert into ' . $table . '_favori (id_' . $table . ', id_utilisateur) values (:id1, :id2)');
    $requete->execute(array(':id1' => $id1, ':id2' => $id2));
}
function removefavorite($id1, $id2, $table)
{
    global $db;

    $requete = $db->prepare('delete from ' . $table . '_favori where id_utilisateur = :id2  and id_' . $table . ' = :id1');
    $requete->execute(array(':id1' => $id1, ':id2' => $id2));
}
/*vérifie si le '.$table' est en favori */
function isfavorite($id1, $id2, $table)
{
    global $db;

    $requete = $db->prepare('select id_' . $table . ' from ' . $table . '_favori where id_utilisateur = :id2 and id_' . $table . ' = :id1');
    $requete->execute(array(':id1' => $id1, ':id2' => $id2));
    return $requete->fetch();
}
?>