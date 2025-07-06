<?php
if(!isset($_SESSION["id"])){

    session_start();
  }
  if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
    if ($_POST["Deconnexion"]?? null) {
      session_unset();
        session_destroy();
    }
  }

$affichage="";
    if (isset($_SESSION['email']) && isset($_SESSION['mot_de_passe'])) {
                $email = $_SESSION['email'];
                $mot_de_passe = $_SESSION['mot_de_passe'];}
    else{
                    $email = "";
                    $mot_de_passe =""; 
        }
if (isset($_SESSION["id"]) && !empty($_SESSION["id"])) {
   $affichage="<div class='connecter'>
            <form action='../controllers/verification.php' method='post'>
            <input type='hidden' name='email' value = '".$email."'>
            <input type='hidden' name='mot_de_passe' value='".$mot_de_passe."'>
            <button class='btn-co'>Profil</button>
            </form>
        </div>
    </div>";
}else{
$affichage="<div class='connecter'>
            <form action='../controllers/afficher_connexion.php' method='post'>
            <button class='btn-co'>connexion</button>
            </form>
        </div>";
    }
    