-- IT0049 TFA2: From Arrays to a Real Database
-- BALATBAT, DENZEL GAVIN
-- Import once into a new database. No existing tables are dropped.
-- On hosting with a pre-created database, omit CREATE DATABASE and USE below,
-- select the assigned database, and import the remaining statements.

CREATE DATABASE IF NOT EXISTS pos_db
  CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE pos_db;

CREATE TABLE customers (
  id INT AUTO_INCREMENT PRIMARY KEY,
  full_name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  phone VARCHAR(20),
  created_at DATETIME NOT NULL
);

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  full_name VARCHAR(100) NOT NULL,
  created_at DATETIME NOT NULL
);

INSERT INTO customers (id, full_name, email, phone, created_at) VALUES
(1, 'Ava Santos', 'ava.santos@example.com', '09170000001', '2026-10-01 09:00:00'),
(2, 'Liam Cruz', 'liam.cruz@example.com', '09170000002', '2026-10-02 09:30:00'),
(3, 'Mia Reyes', 'mia.reyes@example.com', NULL, '2026-10-03 10:00:00'),
(4, 'Noah Garcia', 'noah.garcia@example.com', '09170000004', '2026-10-04 10:30:00'),
(5, 'Ella Flores', 'ella.flores@example.com', '09170000005', '2026-10-05 11:00:00');

INSERT INTO users (id, username, full_name, created_at) VALUES
(1, 'olivia.martin', 'Olivia Martin', '2026-10-01 08:00:00'),
(2, 'ethan.lee', 'Ethan Lee', '2026-10-02 08:30:00'),
(3, 'sophia.tan', 'Sophia Tan', '2026-10-03 09:00:00'),
(4, 'lucas.wong', 'Lucas Wong', '2026-10-04 09:30:00'),
(5, 'isla.brown', 'Isla Brown', '2026-10-05 10:00:00');
