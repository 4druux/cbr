<?php
include "../koneksi.php";
$kdhapus = $_GET['kdhapus'];
if (!empty($kdhapus)) {
    $stmt = $koneksi->prepare("DELETE FROM penyakit_solusi WHERE kd_penyakit = ?");
    $stmt->bind_param("s", $kdhapus);
    if ($stmt->execute()) {
        echo "<script>alert('Data Berhasil Dihapus !')</script>";
        header("Location: haladmin.php?top=penyakit_solusi.php");
        exit();
    } else {
        echo "<script>alert('Data Gagal Dihapus !')</script>";
        header("Location: haladmin.php?top=penyakit_solusi.php");
        exit();
    }
}
?>