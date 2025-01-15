CREATE DATABASE Youdemy;

USE Youdemy;

-- Table Utilisateur
CREATE TABLE Utilisateur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    role ENUM('Administrateur', 'Etudiant', 'Enseignant') NOT NULL,
    status ENUM('active', 'inactive', 'suspendu') NOT NULL,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table Administrateur
CREATE TABLE Administrateur (
    id INT PRIMARY KEY,
    FOREIGN KEY (id) REFERENCES Utilisateur(id) ON DELETE CASCADE
);

-- Table Etudiant
CREATE TABLE Etudiant (
    id INT PRIMARY KEY,
    FOREIGN KEY (id) REFERENCES Utilisateur(id) ON DELETE CASCADE
);

-- Table Enseignant
CREATE TABLE Enseignant (
    id INT PRIMARY KEY,
    bio TEXT,
    FOREIGN KEY (id) REFERENCES Utilisateur(id) ON DELETE CASCADE
);

-- Table Categorie
CREATE TABLE Categorie (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL UNIQUE,
    description TEXT
);

-- Table Cours
CREATE TABLE Cours (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(150) NOT NULL,
    description TEXT,
    contenu TEXT,
    enseignant_id INT NOT NULL,
    categorie_id INT,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (enseignant_id) REFERENCES Enseignant(id) ON DELETE CASCADE,
    FOREIGN KEY (categorie_id) REFERENCES Categorie(id) ON DELETE SET NULL
);

-- Table Tags
CREATE TABLE Tags (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL UNIQUE
);

-- Table CoursTag (Relation Many-to-Many entre Cours et Tags)
CREATE TABLE CoursTag (
    cours_id INT NOT NULL,
    tag_id INT NOT NULL,
    PRIMARY KEY (cours_id, tag_id),
    FOREIGN KEY (cours_id) REFERENCES Cours(id) ON DELETE CASCADE,
    FOREIGN KEY (tag_id) REFERENCES Tags(id) ON DELETE CASCADE
);

-- Table Enrollment (Inscription des étudiants aux cours)
CREATE TABLE Enrollment (
    id INT AUTO_INCREMENT PRIMARY KEY,
    etudiant_id INT NOT NULL,
    cours_id INT NOT NULL,
    date_inscription TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (etudiant_id) REFERENCES Etudiant(id) ON DELETE CASCADE,
    FOREIGN KEY (cours_id) REFERENCES Cours(id) ON DELETE CASCADE
);
