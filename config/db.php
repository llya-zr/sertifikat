<?php
$koneksi = new mysqli("localhost", "root", "", "sertifikat_db");
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>
