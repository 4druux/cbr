<?php
include "../koneksi.php";
$id_relasi = $_POST['textrelasi'];
$kd_penyakit = $_POST['TxtKdPenyakit'];
$kd_gejala = $_POST['TxtKdGejala'];
$bobot = $_POST['txtbobot'];
$stmt = $koneksi->prepare("UPDATE relasi SET kd_penyakit=?, kd_gejala=?, bobot=? WHERE id_relasi=?");
$stmt->bind_param("ssii", $kd_penyakit, $kd_gejala, $bobot, $id_relasi);
if ($stmt->execute()) {
    echo "<script>alert('Data Berhasil Diubah !')</script>";
    header("Location: ../admin/haladmin.php?top=Relasi.php");
    exit();
} else {
    echo "<script>alert('Data Gagal Diubah !')</script>";
    header("Location: ../admin/haladmin.php?top=Relasi.php");
    exit();
}
?>