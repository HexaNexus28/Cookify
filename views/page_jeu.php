<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quiz Page</title>
  <link rel="stylesheet" href="../styles/page_jeu.css">
  <?php 
    header("Refresh: 10;url=../controllers/verifier_reponse.php?proposition=null");
  ?>
</head>
<body>
  <?php
    if ($_SESSION['audioPlayed'] == true) {
      echo '<audio autoplay loop>
              <source src="../music_jeu/silly-kids-funny-cute-comedy-music-253487.mp3#t=45" type="audio/mp3">
              Votre navigateur ne supporte pas la balise audio.
            </audio>';
            
    }
    $progress = ($nombre_de_questions / 10) * 100;
  ?>
  <div class="quiz-container">
    <h1>Quiz Challenge</h1>
    <div class="progress-bar">
    <span style="width: <?php echo $progress; ?>%;"></span>
    </div>
    <p class="question">Question <?php echo $nombre_de_questions ?>/10</p>
    <?php
      echo '<p class="question">'.$question.'</p>';
      for ($i = 0; $i < count($proposition); $i++) {
          echo "<form action='../controllers/verifier_reponse.php' method='post'>
                  <input type='hidden' name='session_code' value='".$session_code."' />
                  <input type='hidden' name='id_question' value='".$id_question."' />
                  <input type='submit' name='proposition' class='proposition' value='".$proposition[$i]."'/>
                </form>";
      }
    ?>
    <footer>
      <p>Refreshing in 10 seconds...</p>
    </footer>
  </div>
</body>
</html>
