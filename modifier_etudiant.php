<?php
include 'db.php';

if (!isset($_GET['id_etudiant'])) {
    header("Location: liste_etudiant.php");
    exit();
}

$id_etudiant = (int)$_GET['id_etudiant'];
$result = $conn->query("SELECT * FROM etudiants WHERE id = $id_etudiant");
$etudiant = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $genre = $_POST['genre'];
    $quartier = $_POST['quartier'];
    $contact = $_POST['contact'];
    $id_filiere = $_POST['id_filiere'];

    $conn->query("UPDATE etudiants SET nom = '$nom', prenom = '$prenom', email = '$email', genre = '$genre', quartier = '$quartier', contact = '$contact', id_filiere = $id_filiere WHERE id = $id_etudiant");

    header("Location: liste_etudiant.php");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier Étudiant</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <h2>Modifier les informations de l'Étudiant</h2>
    <form action="" method="post">
        <label>Nom :</label>
        <input type="text" name="nom" value="<?= $etudiant['nom'] ?>" required><br>
        <label>Prénom :</label>
        <input type="text" name="prenom" value="<?= $etudiant['prenom'] ?>" required><br>
        <label>Email :</label>
        <input type="email" name="email" value="<?= $etudiant['email'] ?>" required><br>
        <label>Genre :</label>
        <select name="genre">
            <option value="M" <?= $etudiant['genre'] == 'M' ? 'selected' : '' ?>>M</option>
            <option value="F" <?= $etudiant['genre'] == 'F' ? 'selected' : '' ?>>F</option>
        </select><br>
        <label>Quartier :</label>
        <input type="text" name="quartier" value="<?= $etudiant['quartier'] ?>" required><br>
        <label>Contact :</label>
        <input type="text" name="contact" value="<?= $etudiant['contact'] ?>" required><br>
        <label>Filière :</label>
        <select name="id_filiere">
            <?php
            $filieres = $conn->query("SELECT * FROM filieres");
            while ($filiere = $filieres->fetch_assoc()) {
                echo "<option value='{$filiere['id']}'" . ($etudiant['id_filiere'] == $filiere['id'] ? " selected" : "") . ">{$filiere['nom_filiere']}</option>";
            }
            ?>
        </select><br>
        <button type="submit">Modifier</button>
        <a class="C" href="liste_etudiant.php">Ma liste</a>
        <a class="C" href="ajout_etudiant.php">Ajouter un etudiant</a>
    </form>
        </div>
</body>
</html>