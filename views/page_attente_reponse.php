
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Attente des  reponses des autres joueurs ... </p>
    <?php
    $trivia = [
    "Saviez-vous ? Le croissant n'est pas d'origine française mais viennoise !",
    "Un œuf frais coule au fond de l'eau, un œuf vieux flotte.",
    "Le sel améliore non seulement la saveur, mais aussi la texture des pâtes."
];
$random_trivia = $trivia[array_rand($trivia)];
echo "<p style='font-style: italic;'>💡 $random_trivia</p>";
?>
</body>
</html>
<?php
      header("Refresh:1;url=../controllers/verifier_reponse.php?affichage=".$affichage);
      exit();
?>