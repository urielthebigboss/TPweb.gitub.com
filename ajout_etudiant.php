

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Étudiant</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <form method="post">
    <h2>BIENVENUE</h2>
    <?php
    include 'db.php';
    if (isset($_POST['ajouter'])) {
        $nom = $conn->real_escape_string($_POST['nom']);
        $prenom = $conn->real_escape_string($_POST['prenom']);
        $email = $conn->real_escape_string($_POST['email']);
        $genre = $conn->real_escape_string($_POST['genre']);
        $quartier = $conn->real_escape_string($_POST['quartier']);
        $contact = $conn->real_escape_string($_POST['contact']);
        $id_filiere = (int)$_POST['id_filiere'];
    
        // Vérification de l'existence de l'email
        $check = $conn->query("SELECT * FROM etudiants WHERE email = '$email'");
        if ($check->num_rows > 0) {
            echo "Cet étudiant existe déjà.";
        } else {
            $sql = "INSERT INTO etudiants (nom, prenom, email, genre, quartier, contact, id_filiere) 
                    VALUES ('$nom', '$prenom', '$email', '$genre', '$quartier', '$contact', $id_filiere)";
            if ($conn->query($sql)) {
                echo "Étudiant ajouté avec succès.";
            } else {
                echo "Erreur : " . $conn->error;
            }
        }
    
    }
    ?>
      <div class="A">
        <label for="nom">Nom :</label>&nbsp &nbsp
        <input type="text" name="nom" required>
        </div>

      <div class="A">
        <label>Prénom :</label>
        <input type="text" name="prenom" required>
      </div>

      <div class="A">
        <label>Email :</label>&nbsp
        <input type="email" name="email" required>
        </div>

     <div class="A">
        <label>Genre :</label>&nbsp
        <select name="genre">
            <option value="M">Masculin</option>
            <option value="F">Féminin</option>
        </select><br>
        </div>

        <div class="A">
        <label>Quartier :</label>
        <input type="text" name="quartier">
        <label>Contact :</label>
        <input type="text" name="contact">
        </div>

        <div class="A">
        <label>Filière :</label>&nbsp
        <select name="id_filiere">
            <?php
            $filieres = $conn->query("SELECT * FROM filieres");
            while ($filiere = $filieres->fetch_assoc()) {
                echo "<option value='{$filiere['id']}'> La filiere {$filiere['nom_filiere']} </option>";
            }
            ?>
        </select><br>
        </div>
            <button type="submit" name="ajouter">Ajouter</button>
            <a class="C" href="liste_etudiant.php">Ma liste</a>

    </form>
</body>
</html>