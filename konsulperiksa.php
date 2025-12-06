<?php 
ob_start();
include "koneksi.php";
$selectors = '';
if (isset($_POST['gejala'])) {
    $selectors = implode(',', $_POST['gejala']);
}
$data = $koneksi->real_escape_string($selectors);
$pecah = explode(",", $data);
$koneksi->query("DELETE FROM tmp_gejala");
foreach ($pecah as $baris) {
    if (!empty(trim($baris))) {
        $koneksi->query("INSERT INTO tmp_gejala (kd_gejala) VALUES ('" . trim($baris) . "')") or die($koneksi->error);
    }
}
ob_end_clean();
header("Location: index.php?top=proses_diagnosa.php&id=1");
exit();
?>