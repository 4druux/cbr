<?php
include "koneksi.php";
$NOIP = $_SERVER["REMOTE_ADDR"];

$sql_cekh = "SELECT * FROM tmp_penyakit WHERE noip=? GROUP BY kd_penyakit";
$stmt = $koneksi->prepare($sql_cekh);
$stmt->bind_param("s", $NOIP);
$stmt->execute();
$result_cekh = $stmt->get_result();
$hsl_cekh = $result_cekh->num_rows;

if ($hsl_cekh == 1) {
    $hsl_data = $result_cekh->fetch_assoc();
    $sql_pasien =
        "SELECT * FROM tmp_pasien WHERE noip=? ORDER BY id DESC LIMIT 1";
    $stmt_pasien = $koneksi->prepare($sql_pasien);
    $stmt_pasien->bind_param("s", $NOIP);
    $stmt_pasien->execute();
    $hsl_pasien = $stmt_pasien->get_result()->fetch_assoc();

    $sql_in =
        "INSERT INTO analisa_hasil (nama, kelamin, umur, alamat, kd_penyakit, noip, tanggal) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt_in = $koneksi->prepare($sql_in);
    $stmt_in->bind_param(
        "ssisss",
        $hsl_pasien["nama"],
        $hsl_pasien["kelamin"],
        $hsl_pasien["umur"],
        $hsl_pasien["alamat"],
        $hsl_data["kd_penyakit"],
        $hsl_pasien["noip"],
        $hsl_pasien["tanggal"],
    );
    $stmt_in->execute();
    header("Location: ?top=AnalisaHasil.php");
    exit();
}
?>

<script type="text/javascript">
$(document).ready(function() {
    var kodeTidakSatupun = 'G999'; 

    $('input[name="gejala[]"]').change(function() {
        var nilai = $(this).val();
        if (nilai == kodeTidakSatupun && $(this).is(':checked')) {
            $('input[name="gejala[]"]').not(this).prop('checked', false);
        } else if (nilai != kodeTidakSatupun && $(this).is(':checked')) {
            $('input[value="' + kodeTidakSatupun + '"]').prop('checked', false);
        }
    });

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
    <thead>
        <tr>
            <th style="text-align:center; width:5%;">Pilih</th>
            <th style="text-align:center; width:10%;">Kode</th>
            <th style="text-align:center; width:25%;">Nama Gejala</th>
            <th style="text-align:center;">Keterangan</th>
        </tr>
    </thead>
    <tbody>
    <?php
    ($query = $koneksi->query("SELECT * FROM gejala ORDER BY kd_gejala ASC")) or
        die("Query Error: " . $koneksi->error);
    while ($row = $query->fetch_assoc()) { ?>
    <tr>
        <td style="text-align:center; vertical-align: middle;">
            <input type="checkbox" name="gejala[]" id="gejala" value="<?php echo htmlspecialchars(
                $row["kd_gejala"],
            ); ?>">
        </td>
        
        <td style="text-align:center; vertical-align: middle;">
            <strong><?php echo htmlspecialchars($row["kd_gejala"]); ?></strong>
        </td>

        <td style="vertical-align: middle;">
            <strong><?php echo htmlspecialchars($row["gejala"]); ?></strong>
        </td>

        <td>
            <?php echo !empty($row["pengertian"])
                ? htmlspecialchars($row["pengertian"])
                : "-"; ?>
        </td>
    </tr>
    <?php }
    ?>

    <tr> <td style="text-align:center; vertical-align: middle;">
            <input type="checkbox" name="gejala[]" id="gejala" value="G999"> 
        </td>
        <td style="text-align:center; vertical-align: middle;">
            <strong>-</strong>
        </td>
        <td style="vertical-align: middle;">
            <strong>Tidak ada gejala diatas</strong>
        </td>
        <td style="vertical-align: middle;">
            Kondisi tubuh balita sehat dan normal (Gizi Baik).
        </td>
    </tr>
    </tbody>
    </table>
</div>
<button class="btn btn-primary btn-lg btn-block"><span class="glyphicon glyphicon-ok"></span> Proses Konsultasi</button>
</form>
</div>