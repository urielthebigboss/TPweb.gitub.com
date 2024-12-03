<?php
include 'db.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Étudiants</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="B">
    <div class="container">
    <h2>Liste des Étudiants</h2>
    <a class="C" href="ajout_etudiant.php">Ajouter un etudiant</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Genre</th>
            <th>Quartier</th>
            <th>Contact</th>
            <th>Filière</th>
            <th>Actions</th>
        </tr>
        <?php
        $sql = "SELECT etudiants.*, filieres.nom_filiere FROM etudiants
                LEFT JOIN filieres ON etudiants.id_filiere = filieres.id";
        $result = $conn->query($sql);
        while ($etudiant = $result->fetch_assoc()) {
            echo "<tr>
                <td>{$etudiant['id']}</td>
                <td>{$etudiant['nom']}</td>
                <td>{$etudiant['prenom']}</td>
                <td>{$etudiant['email']}</td>
                <td>{$etudiant['genre']}</td>
                <td>{$etudiant['quartier']}</td>
                <td>{$etudiant['contact']}</td>
                <td>{$etudiant['nom_filiere']}</td>
                <td>
                    <a href='details_etudiant.php?id_etudiant={$etudiant['id']}'>Voir plus</a>
                    <a href='modifier_etudiant.php?id_etudiant={$etudiant['id']}'>Modifier</a>
                    <a href='supprimer_etudiant.php?id_etudiant={$etudiant['id']}'>Supprimer</a>
                </td>
            </tr>";
        }
        ?>
    </table>
    </div>
    </div>
</body>
</html>