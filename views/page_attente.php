<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/page_attente.css">
    <?php 
    echo "<meta http-equiv='refresh' content='1;url=../controllers/afficher_page_attente.php?pseudo=" . $pseudo . "&session_code=" . $session_code . "'>";
    ?>
    <title>En attente de joueurs</title>
</head>
<body>
    <p>En Attente d'autres joueurs...</p>
    <p class="code">Code de la partie : <?php echo htmlspecialchars($session_code); ?></p>
    <div class="players">
        <?php 
        foreach ($playersdata as $player) {
            echo '<p>' . htmlspecialchars($player['pseudo']) . '</p>';
        }

        if (!empty($affichage)) {
            echo '<div class="start-game">' . $affichage . '</div>';
        }
        ?>
    </div>
    <div class="loader"></div>
</body>
</html>
