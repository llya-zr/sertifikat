<?php
session_start();
include '../config/db.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

$query = $koneksi->query("SELECT * FROM users WHERE username='$username' AND password='$password'");
$user = $query->fetch_assoc();

if ($user) {
    $_SESSION['username'] = $user['username'];
    $_SESSION['role'] = $user['role'];

    if ($user['role'] == 'admin') {
        header("Location: ../admin/index.php");
    } else {
        header("Location: ../teknisi/index.php");
    }
} else {
    echo "Login gagal!";
}
?>
