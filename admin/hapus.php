<?php
include '../auth/cek_login.php';
include '../config/db.php';

$id = $_GET['id'];
$koneksi->query("DELETE FROM sertifikat WHERE id=$id");

header("Location: index.php");
?>
