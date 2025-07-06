<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="../styles/pg_pseudo.css"> 
</head>
<body>
    <div class="container">
        <h1>Crée une partie de quiz !</h1>

        <?php
       
        echo '
        <form action="../controllers/afficher_page_attente.php" method="get" class="quiz-form">
            <input type="text" name="pseudo" placeholder="Entre ton pseudo" class="input-text" required>
            <input type="hidden" name="session_code" value="' . htmlspecialchars($session_code) . '">
            <button type="submit" class="submit-btn">C\'est parti !</button>
        </form>';
        ?>
<?php
if(!empty($affichage)){
    echo $affichage;
}
    if ($_SESSION['audioPlayed'] == true) {
        echo '<audio autoplay loop>
                <source src="../music_jeu/silly-kids-funny-cute-comedy-music-253487.mp3" type="audio/mp3">
                Votre navigateur ne supporte pas la balise audio.
              </audio>';
    }
    ?>
    </div>
</body>
</html>
