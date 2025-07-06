<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles/e.css">
    <meta http-equiv="refresh" content="20; url=../controllers/temps_ecouler.php">
</head>
<body>
    <div id="top-bar">
        <div id="question-counter">
            <p style="text-align: center;">
                <?php echo $message; ?>
            </p>
            <p style="text-align: center;">
                Question <?php echo $compteur + 1; ?> sur <?php echo $nombre_total_question; ?>
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
                    echo '<form method="POST" action="../controllers/jeu_solo_vérification.php">';
                    echo '<input type="hidden" name="temps_restant" id="temps_restant" value="">';
                    echo '<button name="reponse" value="' . $proposition . '" class="reponse">' . $proposition . '</button>';
                    echo '<input type="hidden" name="choisir_question_suivante" value="' . $compteur . '">';
                    echo '<input type="hidden" name="categorie" value="' . $categorie . '">';
                    echo '<input type="hidden" name="correcte" value="' . $question['est_correcte'] . '">';
                    echo '</form>';
                }
                ?>
            </div>
        </div>
    </div>
    <div id="timer-container">
        <p><span id="timer">00:20</span></p>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const timerElement = document.getElementById('timer');
            const tempsRestantInputs = document.querySelectorAll('input[name="temps_restant"]');
            let time = 20; // Temps initial en secondes
            let intervalId;
            let tempsRestant = time; // Variable globale pour stocker le temps restant

            function startTimer() {
                intervalId = setInterval(() => {
                    time--;
                    tempsRestant = time; // Mettre à jour la variable globale
                    const minutes = Math.floor(time / 60);
                    const seconds = time % 60;
                    timerElement.textContent = `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;

                    if (time <= 0) {
                        clearInterval(intervalId);
                    }
                    tempsRestantInputs.forEach(input => input.value = tempsRestant);
                }, 1000);
            }
            startTimer();

            document.querySelectorAll('.reponse').forEach(button => {
                button.addEventListener('click', function() {
                    tempsRestantInputs.forEach(input => input.value = tempsRestant);
                });
            });
        });
    </script>
</body>
</html>
