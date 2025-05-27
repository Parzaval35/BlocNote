CREATE DATABASE IF NOT EXISTS blocnote;

USE blocnote;

CREATE TABLE IF NOT EXISTS utilisateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pseudo VARCHAR(100) NOT NULL UNIQUE,
    email VARCHAR(150) NOT NULL UNIQUE,
    mot_de_passe VARCHAR(255) NOT NULL,
    
    role ENUM('utilisateur', 'admin') DEFAULT 'utilisateur',
);
