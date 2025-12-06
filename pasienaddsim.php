<?php 
include "koneksi.php";
$TxtNama = $_REQUEST['TxtNama'];
$RbKelamin = $_POST['cbojk'];
$TxtUmur = $_REQUEST['TxtUmur'];
$TxtAlamat = $_REQUEST['TxtAlamat'];
$NOIP = $_SERVER['REMOTE_ADDR'];
if (empty(trim($TxtNama)) || empty(trim($TxtUmur)) || empty(trim($TxtAlamat))) {
    include "PasienAddFm.php";
    echo "Lengkapi semua data!";
} else {
    $koneksi->query("DELETE FROM tmp_pasien WHERE noip='$NOIP'");
    $koneksi->query("DELETE FROM tmp_penyakit WHERE noip='$NOIP'");
    $koneksi->query("DELETE FROM tmp_analisa WHERE noip='$NOIP'");
    $koneksi->query("DELETE FROM tmp_gejala WHERE noip='$NOIP'");
    $sql = "INSERT INTO tmp_pasien (nama, kelamin, umur, alamat, noip, tanggal) VALUES (?, ?, ?, ?, ?, NOW())";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ssiss", $TxtNama, $RbKelamin, $TxtUmur, $TxtAlamat, $NOIP);
    $stmt->execute() or die("SQL Error: " . $stmt->error);
    header("Location: index.php?top=konsultasifm.php");
    exit();
}
?>