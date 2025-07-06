<?php
session_start();
if (!isset($_SESSION['audioPlayed'])) {
  $_SESSION['audioPlayed'] = true; 
}
require '../views/rejoindre_partie.php';