<?php 
require "../models/jeu_quiz.php";
$categories = afficher_categories_questions();
require "../views/jeu_categories_question.php";