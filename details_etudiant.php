<?php
include 'db.php';

if (!isset($_GET['id_etudiant'])) {
    header("Location: liste_etudiant.php");
    exit();
}

$id_etudiant = (int)$_GET['id_etudiant'];
$result = $conn->query("SELECT * FROM etudiants WHERE id = $id_etudiant");
$etudiant = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détails Étudiant</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <h2>Information Étudiant</h2>
    <p><strong>Nom:</strong> <?= $etudiant['nom'] ?></p>
    <p><strong>Prénom:</strong> <?= $etudiant['prenom'] ?></p>
    <p><strong>Email:</strong> <?= $etudiant['email'] ?></p>
    <p><strong>Genre:</strong> <?= $etudiant['genre'] ?></p>
    <p><strong>Quartier:</strong> <?= $etudiant['quartier'] ?></p>
    <p><strong>Contact:</strong> <?= $etudiant['contact'] ?></p>
    <p><strong>Photo:</strong> <img src="uploads/<?= $etudiant['photo'] ?>" alt="Photo" width="100"></p>

    <form action="traitement_image.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_etudiant" value="<?= $etudiant['id'] ?>">
        <label>Ajouter une image :</label>
        <input type="file" name="photo" required>
        <button type="submit">Enregistrer</button>
        <a class="C" href="liste_etudiant.php">Ma liste</a>
        <a class="C" href="ajout_etudiant.php">Ajouter un etudiant</a>
    </form>
</div>
</body>
</html>