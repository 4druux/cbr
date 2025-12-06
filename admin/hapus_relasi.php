<?php
include "../koneksi.php";
$id_relasi = $_GET['id_relasi'];
$stmt = $koneksi->prepare("DELETE FROM relasi WHERE id_relasi=?");
$stmt->bind_param("i", $id_relasi);
if ($stmt->execute()) {
    echo "<script>alert('Data Berhasil Dihapus !')</script>";
    header("Location: ../admin/haladmin.php?top=Relasi.php");
    exit();
} else {
    echo "<script>alert('Data Gagal Dihapus !')</script>";
    header("Location: ../admin/haladmin.php?top=Relasi.php");
    exit();
}
?>