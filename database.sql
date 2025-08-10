CREATE DATABASE sertifikat_db;
USE sertifikat_db;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(255),
    role ENUM('admin', 'teknisi')
);

INSERT INTO users (username, password, role) VALUES
('admin', MD5('admin123'), 'admin'),
('teknisi', MD5('teknisi123'), 'teknisi');

CREATE TABLE sertifikat (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nomor_order VARCHAR(50),
    nomor_sertif VARCHAR(50),
    nama_alat VARCHAR(100),
    tgl_diterima DATE,
    tgl_dikalibrasi DATE,
    nama_perusahaan VARCHAR(100),
    jumlah_alat INT
);
