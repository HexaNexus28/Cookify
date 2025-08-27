<?php

require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

try {
    $db = new PDO(
        "mysql:host={$_ENV['dbhost']};dbname={$_ENV['dbname']};charset=utf8",
        $_ENV['dbuser'],
        $_ENV['dbpassword']
    );
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connexion Réussie";
} catch (PDOException $e) {
    die("Erreur DB : " . $e->getMessage());
}