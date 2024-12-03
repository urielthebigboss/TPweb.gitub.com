<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'gestion_etudiants';

// Connexion à la base de données
$conn = new mysqli($host, $user, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}
?>