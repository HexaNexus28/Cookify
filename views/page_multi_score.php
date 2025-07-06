
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/pg_multi_score.css">
    <title>Résultats</title>
    <?php 
    if($nombre_de_questions < 10){
      echo '<meta http-equiv="refresh" content="10;url=../controllers/commencer_partie.php?session_code=' . $session_code . '">';
    }
  ?>
</head>
<body>
    <p>Prochaine question dans ...</p>
    <div class="progress-bar">
        <div class="progress-bar-inner"></div>
    </div>

    <?php
    if(!empty($affichage)){
        echo $affichage;
    }
    echo "<table>
    <tr><th>Joueur</th><th>Points</th></tr>";
    foreach ($players as $player) {
        echo "<tr>
        <td>{$player['pseudo']}</td>
        <td>{$player['scoretotal']}</td>
        </tr>";
    }
    echo "</table>";
    ?>
    <div class="badge-progress">
        <h4>Progression vers Chef cuistot :</h4>
        <div class="progress-bar1">
            <div class="progress1" style="width: <?= $progressChef ?>%;"></div>
        </div>
        <h4>Progression vers Maître des recettes :</h4>
        <div class="progress-bar1">
            <div class="progress1" style="width: <?= $progressMaitre ?>%;"></div>
        </div>
    </div>

    <h3>Badges débloqués :</h3>
    <div class="badges-container">
        <?php
        if (count($badges) > 0) {
            foreach ($badges as $badge) {
                echo "<div class='badge'>
                    <img src='{$badge['image']}' alt='{$badge['nom']}'>
                    <p><strong>{$badge['nom']}</strong></p>
                    <p>{$badge['description']}</p>
                </div>";
            }
        } else {
            echo "<p>Aucun badge débloqué pour le moment. Continuez à jouer pour en obtenir !</p>";
        }
        ?>
    </div>
</body>
</html>
