<?php
$serveur = "localhost";
$dbname = "rdv";
$user = "root";
$pass = "";

try {
    //On se connecte à la BDD
    $dbco = new PDO("mysql:host=$serveur;dbname=$dbname", $user, $pass);
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //On crée une table form
    $form = "CREATE TABLE form(
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            nom TEXT,
            prenom TEXT,
            addresse Text,
            age INT,
            email TEXT,
            numerotel Text,
            daterdv date,
            heure time
            )";
    $dbco->exec($form);
} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage();
}
