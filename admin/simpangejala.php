<?php
include "../koneksi.php";
$kd_gejala = $_POST['kd_gejala'];
$gejala = $_POST['gejala'];
$stmt_cek = $koneksi->prepare("SELECT kd_gejala FROM gejala WHERE kd_gejala=?");
$stmt_cek->bind_param("s", $kd_gejala);
$stmt_cek->execute();
$result_cek = $stmt_cek->get_result();
if ($result_cek->num_rows == 0) {
    $stmt_insert = $koneksi->prepare("INSERT INTO gejala (kd_gejala, gejala) VALUES (?, ?)");
    $stmt_insert->bind_param("ss", $kd_gejala, $gejala);
    if ($stmt_insert->execute()) {
        echo "<script>alert('Data Berhasil Disimpan !')</script>";
        header("Location: haladmin.php?top=gejala.php");
        exit();
    } else {
        echo "<script>alert('Data Gagal Disimpan !')</script>";
        header("Location: haladmin.php?top=gejala.php");
        exit();
    }
} else {
    echo "<script>alert('Kode Gejala Sudah Ada !')</script>";
    header("Location: haladmin.php?top=gejala.php");
    exit();
}
?>