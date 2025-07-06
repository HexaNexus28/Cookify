<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <link rel="stylesheet" href="../styles/veri.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <meta http-equiv="refresh" content="2; url=../controllers/afficher_question_suivante.php">
</head>
<body>
    <div id="top-bar">
        <div id="question-counter">
            <p style="text-align: center;">
                <?php echo $message; ?>
            </p>
            <p style="text-align: center;">
                Question <?php echo $_SESSION['compteur'] + 1; ?> sur <?php echo $nombre_total_question; ?>
            </p>
        </div>
        <div class="retour" style="position: absolute; top: 0; right: 0;">
            <form action="../controllers/afficher_page_jeu_categories.php" method="post">
                <button id="return-button">Retour</button>
            </form>
        </div>
    </div>
    <div id="quiz-container">
        <div class="question-container" id="question-container">
            <p class="question"><?php echo $question['question']; ?></p>
            <div class="button-container">
                <?php
                $propositions = explode(".", $question['proposition']);
                foreach ($propositions as $proposition) {
                    $couleur = ($proposition == $reponse_utilisateur) ? $couleur_boutton : '';
                    echo '<button name="reponse" value="' . $proposition . '" class="reponse ' . $couleur . '">' . $proposition . '</button>';
                }
                ?>
            </div>
        </div>
    </div>
    <div id="timer-container">
        <p><span id="timer"><?php echo sprintf('%02d:%02d', floor($temps_restant / 60), $temps_restant % 60); ?></span></p>
    </div>
</body>
</html>
