<?php
include 'db.php';

if (!isset($_GET['id_etudiant'])) {
    header("Location: liste_etudiant.php");
    exit();
}

$id_etudiant = (int)$_GET['id_etudiant'];
$conn->query("DELETE FROM etudiants WHERE id = $id_etudiant");

header("Location: liste_etudiant.php");
exit();
?>