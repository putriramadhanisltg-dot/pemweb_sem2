-- Database setup for Tugas 1
CREATE DATABASE IF NOT EXISTS tugas1_db CHARACTER SET utf8 COLLATE utf8_general_ci;
USE tugas1_db;

-- Users table (for login)
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Level table (TK, SD, SMP, SMA, dst)
CREATE TABLE IF NOT EXISTS level (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL
);

-- Studies table
CREATE TABLE IF NOT EXISTS studies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(150) NOT NULL,
    idlevel INT NOT NULL,
    keterangan TEXT,
    tahun_lulus INT,
    foto_sekolah VARCHAR(255),
    FOREIGN KEY (idlevel) REFERENCES level(id) ON DELETE CASCADE
);

-- Seed default admin user (password: admin123)
INSERT INTO users (username, password, role) VALUES
('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
('user1', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user')
ON DUPLICATE KEY UPDATE id=id;

-- Seed level data
INSERT INTO level (nama) VALUES
('TK'), ('SD'), ('SMP'), ('SMA'), ('D3'), ('S1'), ('S2'), ('S3')
ON DUPLICATE KEY UPDATE id=id;

-- Seed studies data
INSERT INTO studies (nama, idlevel, keterangan, tahun_lulus, foto_sekolah) VALUES
('TK Bina Bangsa', 1, 'Taman kanak-kanak favorit di kota.', 2005, 'tk.jpg'),
('SDN 01 Menteng', 2, 'Sekolah dasar negeri terbaik di Jakarta.', 2011, 'sd.jpg'),
('SMPN 3 Jakarta', 3, 'SMP dengan ekstrakurikuler lengkap.', 2014, 'smp.jpg'),
('SMAN 8 Jakarta', 4, 'SMA unggulan di Jakarta Selatan.', 2017, 'sma.jpg'),
('Universitas Indonesia', 6, 'Jurusan Teknik Informatika, kampus NF Depok.', 2021, 'nf.jpg');
