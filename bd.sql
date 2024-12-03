-- Création de la base de données
CREATE DATABASE gestion_etudiants;

-- Utilisation de la base de données
USE gestion_etudiants;

-- Table filieres
CREATE TABLE filieres (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_filiere VARCHAR(100) NOT NULL,
    description_filiere TEXT
);

-- Table etudiants
CREATE TABLE etudiants (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    genre ENUM('M', 'F') NOT NULL,
    quartier VARCHAR(100),
    contact VARCHAR(15),
    photo VARCHAR(255),
    id_filiere INT,
    FOREIGN KEY (id_filiere) REFERENCES filieres(id) ON DELETE CASCADE
);

INSERT INTO filieres (nom_filiere) VALUES
('MIAGE'),
('ASSRI'),
('3EA'),
('SEA'),
('SJAP');
