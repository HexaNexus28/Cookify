<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/rejoindre_partie.css">
</head>
<body>
    <form action="../controllers/verifier_code.php" method="post"><input type="text" name="code" id="" placeholder ='Entrez le code de la partie'><button type="submit">OK!</button></form>
    <?php
    if (!empty($affichage)){
        echo $affichage ;
        }
        
    if ($_SESSION['audioPlayed'] == true) {
        echo '<audio autoplay loop>
                <source src="../music_jeu/silly-kids-funny-cute-comedy-music-253487.mp3" type="audio/mp3">
                Votre navigateur ne supporte pas la balise audio.
              </audio>';
    }
    ?>
</body>

</html>