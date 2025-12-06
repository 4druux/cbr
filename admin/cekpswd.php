<?php
session_start();
include "../koneksi.php";
$username = $_POST['username'];
$password = $_POST['password'];
if (empty($username) || empty($password)) {
    echo "<div align=center><b>Nama atau Password Belum diisi !</b></div>";
    exit;
}
$stmt = $koneksi->prepare("SELECT username, password FROM login WHERE username = ? AND password = ?");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows >= 1) {
    $_SESSION['username'] = $username;
    header("Location: haladmin.php?top=home.php");
    exit();
} else {
    echo "<script>alert('Username dan Password tidak sesuai !')</script>";
    echo "<meta http-equiv='refresh' content='0; url=index.php'>";
}
?>