<?php
include "../koneksi.php";
$kdhapus = $_GET['kdhapus'];
if (!empty($kdhapus)) {
    $stmt = $koneksi->prepare("DELETE FROM gejala WHERE kd_gejala=?");
    $stmt->bind_param("s", $kdhapus);
    if ($stmt->execute()) {
        echo "<script>alert('Data Berhasil Dihapus !')</script>";
        header("Location: haladmin.php?top=gejala.php");
        exit();
    } else {
        echo "<script>alert('Data Gagal Dihapus !')</script>";
        header("Location: haladmin.php?top=gejala.php");
        exit();
    }
}
?>