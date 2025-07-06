<?php    
require "../models/afficher_inscription.php";
if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $mot_de_passe = $_POST["mot_de_passe"];
    insertdonnee($nom, $prenom, $email, $mot_de_passe);
    };
require "../views/confirmation_inscription.php"; 
