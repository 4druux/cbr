<?php 
include "../koneksi.php";
$TxtKdPenyakit = $_POST['TxtKdPenyakit'];
$TxtKdGejala = $_POST['TxtKdGejala'];
$bobot = $_POST['txtbobot'];
if (empty(trim($TxtKdPenyakit)) || empty(trim($TxtKdGejala))) {
    echo "Kode Penyakit atau Kode Gejala masih kosong, ulangi kembali";
    include "relasi.php";
    exit();
}
$stmt_cek = $koneksi->prepare("SELECT * FROM relasi WHERE kd_penyakit=? AND kd_gejala=?");
$stmt_cek->bind_param("ss", $TxtKdPenyakit, $TxtKdGejala);
$stmt_cek->execute();
$result_cek = $stmt_cek->get_result();
if ($result_cek->num_rows >= 1) {
    echo "<script>alert('Relasi Sudah Ada !')</script>";
    header("Location: ../admin/haladmin.php?top=relasi.php");
    exit();
} else {
    $stmt_insert = $koneksi->prepare("INSERT INTO relasi (kd_penyakit, kd_gejala, bobot) VALUES (?, ?, ?)");
    $stmt_insert->bind_param("ssi", $TxtKdPenyakit, $TxtKdGejala, $bobot);
    if ($stmt_insert->execute()) {
        echo "<script>alert('Berhasil Direlasikan !')</script>";
        header("Location: ../admin/haladmin.php?top=relasi.php");
        exit();
    } else {
        echo "<script>alert('Gagal Direlasikan !')</script>";
        header("Location: ../admin/haladmin.php?top=relasi.php");
        exit();
    }
}
?>