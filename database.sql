-- Sandesh Art Gallery Database Schema

-- Drop the database if it exists (be careful with this in production!)
DROP DATABASE IF EXISTS sandesh_gallery;

-- Create database with proper UTF-8 character support
CREATE DATABASE sandesh_gallery
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

-- Use the database
USE sandesh_gallery;

CREATE TABLE IF NOT EXISTS users (
  id int(11) NOT NULL AUTO_INCREMENT,
  username varchar(30) NOT NULL,
  email varchar(100) NOT NULL,
  password varchar(255) NOT NULL,
  newsletter tinyint(1) DEFAULT '0',
  created_at datetime NOT NULL,
  updated_at datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  last_login datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
);

CREATE TABLE IF NOT EXISTS remember_tokens (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    token VARCHAR(255) NOT NULL,
    expires_at DATETIME NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
)