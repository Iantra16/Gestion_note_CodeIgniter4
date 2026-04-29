CREATE DATABASE IF NOT EXISTS gestion_notes CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE gestion_notes;

-- 1. Tables de base (sans clés étrangères)
CREATE TABLE semestre (
    idSemestre INT AUTO_INCREMENT PRIMARY KEY,
    numero INT NOT NULL,
    libelle VARCHAR(50) NOT NULL    
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE parcours (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    responsable VARCHAR(255)    
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE ue (
    id INT AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(20) NOT NULL UNIQUE,
    intitule VARCHAR(255) NOT NULL,
    credit INT NOT NULL    
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE etudiant (
    id INT AUTO_INCREMENT PRIMARY KEY,
    num_etu VARCHAR(20) NOT NULL UNIQUE,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL    
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- 2. Gestion des utilisateurs et rôles
CREATE TABLE `groups` (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL    
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255),
    pwd VARCHAR(255) NOT NULL -- Sera haché en PHP    
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE user_group (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    group_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (group_id) REFERENCES `groups`(id) ON DELETE CASCADE    
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- 3. Tables de liaison et données
CREATE TABLE parcour_ue (
    id INT AUTO_INCREMENT PRIMARY KEY,
    parcours_id INT NOT NULL,
    ue_id INT NOT NULL,
    semestre_id INT NOT NULL,
    obli BOOLEAN DEFAULT TRUE,
    groupe VARCHAR(50) NULL, -- Ex: 'Option_A', 'Math_Choice'
    FOREIGN KEY (parcours_id) REFERENCES parcours(id) ON DELETE CASCADE,
    FOREIGN KEY (ue_id) REFERENCES ue(id) ON DELETE CASCADE,
    FOREIGN KEY (semestre_id) REFERENCES semestre(id) ON DELETE CASCADE    
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE note (
    id INT AUTO_INCREMENT PRIMARY KEY,
    etu_id INT NOT NULL,
    ue_id INT NOT NULL,
    valeur DECIMAL(4,2) NOT NULL, -- Format 00.00
    FOREIGN KEY (etu_id) REFERENCES etudiant(id) ON DELETE CASCADE,
    FOREIGN KEY (ue_id) REFERENCES ue(id) ON DELETE CASCADE    
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;