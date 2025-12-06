<?php
include "../koneksi.php";
$kd_gejala = $_REQUEST['kd_gejala2'];
$gejala = $_REQUEST['gejala'];
$stmt = $koneksi->prepare("UPDATE gejala SET gejala=? WHERE kd_gejala=?");
$stmt->bind_param("ss", $gejala, $kd_gejala);
if ($stmt->execute()) {
    echo "<script>alert('Data Berhasil Diubah !')</script>";
    header("Location: haladmin.php?top=gejala.php");
    exit();
} else {
    echo "<script>alert('Data Gagal Diubah !')</script>";
    header("Location: haladmin.php?top=gejala.php");
    exit();
}
?>