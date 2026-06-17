CREATE DATABASE IF NOT EXISTS gestion_notes CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE gestion_notes;

-- 1. Table des parcours (Dev, BDD/Réseaux, Web, etc.)
CREATE TABLE parcours (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- 2. Table des semestres (S3, S4, etc.)
CREATE TABLE semestres (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- 3. Table des utilisateurs (pour le login admin)
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- 4. Table des étudiants
CREATE TABLE etudiants (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100),
    id_parcours INT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_parcours) REFERENCES parcours(id) ON DELETE SET NULL
) ENGINE=InnoDB;

-- 5. Table des Unités d'Enseignement (UE / Matières)
CREATE TABLE ues (
    id INT AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(20) NOT NULL UNIQUE,
    libelle VARCHAR(255) NOT NULL,
    credits INT DEFAULT 0,
    id_semestre INT,
    id_parcours INT NULL, -- NULL si la matière est commune à tous les parcours
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_semestre) REFERENCES semestres(id) ON DELETE CASCADE,
    FOREIGN KEY (id_parcours) REFERENCES parcours(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- 6. Table des notes
-- On utilise DECIMAL(4,2) pour permettre des notes comme 15.75
CREATE TABLE notes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_etudiant INT NOT NULL,
    id_ue INT NOT NULL,
    note DECIMAL(4,2) NOT NULL CHECK (note >= 0 AND note <= 20),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_etudiant) REFERENCES etudiants(id) ON DELETE CASCADE,
    FOREIGN KEY (id_ue) REFERENCES ues(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Insertion de l'utilisateur admin par défaut (password: admin123)
-- Note: En production, utilisez toujours un hash (password_hash)
INSERT INTO users (username, password) VALUES ('admin', 'admin123');