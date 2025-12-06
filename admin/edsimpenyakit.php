<?php
include "../koneksi.php";
$kd_penyakit = $_POST['kd_penyakit'];
$penyakit = $_POST['in_penyakit'];
$definisi = $_POST['in_definisi'];
$solusi = $_POST['in_solusi'];
$stmt = $koneksi->prepare("UPDATE penyakit_solusi SET nama_penyakit=?, definisi=?, solusi=? WHERE kd_penyakit=?");
$stmt->bind_param("ssss", $penyakit, $definisi, $solusi, $kd_penyakit);
if ($stmt->execute()) {
    echo "<script>alert('Data Berhasil Diubah !')</script>";
    echo "<meta http-equiv='refresh' content='0; url=haladmin.php?top=penyakit_solusi.php'>";
} else {
    echo "<script>alert('Data Gagal Diubah !')</script>";
    echo "<meta http-equiv='refresh' content='0; url=haladmin.php?top=penyakit_solusi.php'>";
}
?>