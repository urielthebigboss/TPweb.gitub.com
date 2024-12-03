<?php
include 'db.php';

if (isset($_POST['ajouter'])) {
    $nom_filiere = $conn->real_escape_string($_POST['nom_filiere']);
    $description_filiere = $conn->real_escape_string($_POST['description_filiere']);

    // Vérification de l'existence de la filière
    $check = $conn->query("SELECT * FROM filieres WHERE nom_filiere = '$nom_filiere'");
    if ($check->num_rows > 0) {
        echo "La filière existe déjà.";
    } else {
        $sql = "INSERT INTO filieres (nom_filiere, description_filiere) VALUES ('$nom_filiere', '$description_filiere')";
        if ($conn->query($sql)) {
            echo "Filière ajoutée avec succès.";
        } else {
            echo "Erreur : " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une Filière</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <h2>Ajouter une Filière</h2>
    <form method="post">
        <label>Nom de la Filière :</label><br>
        <input type="text" name="nom_filiere" required><br>
        <label>Description :</label><br>
        <textarea name="description_filiere" required></textarea><br>
        <button type="submit" name="ajouter">Ajouter</button>
    </form>
</div>
</body>
</html>