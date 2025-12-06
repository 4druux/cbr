<?php 
include "koneksi.php";
$NOIP = $_SERVER['REMOTE_ADDR'];
$sql_cekh = "SELECT * FROM tmp_penyakit WHERE noip=? GROUP BY kd_penyakit";
$stmt = $koneksi->prepare($sql_cekh);
$stmt->bind_param("s", $NOIP);
$stmt->execute();
$result_cekh = $stmt->get_result();
$hsl_cekh = $result_cekh->num_rows;
if ($hsl_cekh == 1) {
    $hsl_data = $result_cekh->fetch_assoc();
    $sql_pasien = "SELECT * FROM tmp_pasien WHERE noip=? ORDER BY id DESC LIMIT 1";
    $stmt_pasien = $koneksi->prepare($sql_pasien);
    $stmt_pasien->bind_param("s", $NOIP);
    $stmt_pasien->execute();
    $hsl_pasien = $stmt_pasien->get_result()->fetch_assoc();
    $sql_in = "INSERT INTO analisa_hasil (nama, kelamin, umur, alamat, kd_penyakit, noip, tanggal) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt_in = $koneksi->prepare($sql_in);
    $stmt_in->bind_param("ssisss", $hsl_pasien['nama'], $hsl_pasien['kelamin'], $hsl_pasien['umur'], $hsl_pasien['alamat'], $hsl_data['kd_penyakit'], $hsl_pasien['noip'], $hsl_pasien['tanggal']);
    $stmt_in->execute();
    header("Location: ?top=AnalisaHasil.php");
    exit();
}
$sql_get_gejala = "SELECT gejala.* FROM gejala, tmp_analisa WHERE gejala.kd_gejala=tmp_analisa.kd_gejala AND tmp_analisa.noip=? AND NOT tmp_analisa.kd_gejala IN (SELECT kd_gejala FROM tmp_gejala WHERE noip=?) ORDER BY gejala.kd_gejala LIMIT 1";
$stmt_gejala = $koneksi->prepare($sql_get_gejala);
$stmt_gejala->bind_param("ss", $NOIP, $NOIP);
$stmt_gejala->execute();
$result_gejala = $stmt_gejala->get_result();
if ($result_gejala->num_rows >= 1) {
    $datag = $result_gejala->fetch_assoc();
    $kdgejala = $datag['kd_gejala'];
    $gejala = $datag['gejala'];
} else {
    $sql_first_gejala = "SELECT * FROM gejala ORDER BY kd_gejala LIMIT 1";
    $result_first_gejala = $koneksi->query($sql_first_gejala);
    $datag = $result_first_gejala->fetch_assoc();
    $kdgejala = $datag['kd_gejala'];
    $gejala = $datag['gejala'];
}
?>

<script type="text/javascript">
$(document).ready(function() {
    $("form").submit(function() {
        if (!isCheckedById("gejala")) {
            alert("Silahkan Pilih Gejala Terlebih Dahulu!");
            return false;
        } else {
            return true;
        }
    });

    function isCheckedById(id) {
        var checked = $("input[id=" + id + "]:checked").length;
        return checked > 0;
    }
});
</script>

<div class="page-header">
    <h1 class="entry-title"><span class="glyphicon glyphicon-stats"></span> Pilih Gejala</h1>
</div>
<div class="entry-content">
<div class="panel panel-default">
    <form method="post" name="form" action="?top=konsulperiksa.php">
    <table class="table table-bordered table-hover table-striped">
    <tbody>
    <?php
    $query = $koneksi->query("SELECT * FROM gejala") or die("Query Error: " . $koneksi->error);
    while ($row = $query->fetch_assoc()) {
    ?>
    <tr>
        <td style="text-align:center;width:5%;"><input type="checkbox" name="gejala[]" id="gejala" value="<?php echo htmlspecialchars($row['kd_gejala']);?>"></td>
        <td><?php echo htmlspecialchars($row['gejala']);?></td>
    </tr>
    <?php } ?>
    </tbody>
    </table>
</div>
<button class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Proses</button>
</form>
</div>