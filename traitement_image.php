<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['photo'])) {
    $id_etudiant = (int)$_POST['id_etudiant'];
    $photo = $_FILES['photo'];

    $upload_dir = 'uploads/';
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir);
    }

    $photo_name = time() . '_' . basename($photo['name']);
    $target_path = $upload_dir . $photo_name;

    if (getimagesize($photo['tmp_name'])) {
        if (move_uploaded_file($photo['tmp_name'], $target_path)) {
            $conn->query("UPDATE etudiants SET photo = '$photo_name' WHERE id = $id_etudiant");
            echo "Photo téléchargée avec succès.";
            header("Location: details_etudiant.php?id_etudiant=$id_etudiant");
        } else {
            echo "Erreur lors de l'enregistrement de l'image.";
        }
    } else {
        echo "Le fichier téléchargé n'est pas une image.";
    }
}
?>