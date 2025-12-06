<?php
include "../koneksi.php";
$kd_penyakit = $_POST['kd_penyakit'];
$nama_penyakit = $_POST['nama_penyakit'];
$definisi = $_POST['definisi'];
$solusi = $_POST['solusi'];
$stmt_cek = $koneksi->prepare("SELECT kd_penyakit FROM penyakit_solusi WHERE kd_penyakit=?");
$stmt_cek->bind_param("s", $kd_penyakit);
$stmt_cek->execute();
$result_cek = $stmt_cek->get_result();
if ($result_cek->num_rows == 0) {
    $stmt_insert = $koneksi->prepare("INSERT INTO penyakit_solusi (kd_penyakit, nama_penyakit, definisi, solusi) VALUES (?, ?, ?, ?)");
    $stmt_insert->bind_param("ssss", $kd_penyakit, $nama_penyakit, $definisi, $solusi);
    if ($stmt_insert->execute()) {
        echo "<script>alert('Data Berhasil Disimpan !')</script>";
        header("Location: ../admin/haladmin.php?top=penyakit_solusi.php");
        exit();
    } else {
        echo "<script>alert('Data Gagal Disimpan !')</script>";
        header("Location: ../admin/haladmin.php?top=penyakit_solusi.php");
        exit();
    }
} else {
    echo "<script>alert('Kode Penyakit Sudah Ada !')</script>";
    header("Location: ../admin/haladmin.php?top=penyakit_solusi.php");
    exit();
}
?>