<?php
include "../koneksi.php";
$id_user = $_GET['id_user'];
$stmt = $koneksi->prepare("DELETE FROM analisa_hasil WHERE id=?");
$stmt->bind_param("i", $id_user);
if ($stmt->execute()) {
    echo "<script>alert('Data Berhasil Dihapus !')</script>";
    header("Location: ../admin/haladmin.php?top=LapUser.php");
    exit();
} else {
    echo "<script>alert('Data Gagal Dihapus !')</script>";
    header("Location: ../admin/haladmin.php?top=LapUser.php");
    exit();
}
?>