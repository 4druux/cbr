<?php
include "../koneksi.php";

if (!isset($_REQUEST["CmbPenyakit"]) || empty($_REQUEST["CmbPenyakit"])) {
    echo "<!DOCTYPE html><html><head><title>Error</title>";
    echo "<link rel='stylesheet' href='https://bootswatch.com/3/darkly/bootstrap.min.css'></head><body>";
    echo "<div class='container' style='margin-top: 20px;'>";
    echo "<div class='alert alert-danger'><strong>Error:</strong> Anda harus memilih penyakit terlebih dahulu dari halaman sebelumnya.</div>";
    echo "<a href='javascript:history.back()' class='btn btn-default'>Kembali</a>";
    echo "</div></body></html>";
    die();
}

$kdsakit = $_REQUEST["CmbPenyakit"];

$stmt = $koneksi->prepare(
    "SELECT * FROM penyakit_solusi WHERE kd_penyakit = ?",
);
$stmt->bind_param("s", $kdsakit);
$stmt->execute();
$result = $stmt->get_result();
$datap = $result->fetch_assoc();

if ($datap) {
    $sakit = $datap["nama_penyakit"];
} else {
    $sakit = "Penyakit Tidak Ditemukan";
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Sistem Pakar Metode Case Based Reasoning</title>
    <meta name="description" content="Description" />
    <meta name="keywords" content="Keywords" />
    
    <?php
    $theme = $_SESSION["theme"] ?? "dark";
    $theme_icon =
        $theme == "dark" ? "glyphicon-certificate" : "glyphicon-adjust";
    ?>

    <?php if ($theme == "light"): ?>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" media="screen" />
    <?php else: ?>
        <link rel="stylesheet" href="https://bootswatch.com/3/darkly/bootstrap.min.css" type="text/css" media="screen" />
    <?php endif; ?>
    
    <link rel="stylesheet" href="../css/general.css" type="text/css" media="screen" />
    <script type="text/javascript">
    function validasi(form) {
        if (form.gejala.value === "") {
            alert("Masukkan Gejala !");
            form.gejala.focus();
            return false;
        }
        form.submit();
    }
    </script>
</head>
<body>

    <div class="panel panel-primary" style="text-align:justify;">
        <div class="panel-heading">
            <h3 class="panel-title">Daftar Gejala Kategori Status Gizi</h3>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <td align="center"><b>No</b></td>
                            <td><b>Kode</b></td>
                            <td><b>Nama Gejala</b></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sqlg =
                            "SELECT gejala.* FROM gejala, relasi WHERE gejala.kd_gejala=relasi.kd_gejala AND relasi.kd_penyakit=? ORDER BY gejala.kd_gejala";
                        $stmt_g = $koneksi->prepare($sqlg);
                        $stmt_g->bind_param("s", $kdsakit);
                        $stmt_g->execute();
                        $qryg = $stmt_g->get_result();
                        $no = 0;
                        while ($datag = $qryg->fetch_assoc()) {
                            $no++; ?>
                        <tr>
                            <td align="center"><?php echo $no; ?></td>
                            <td><?php echo htmlspecialchars(
                                $datag["kd_gejala"],
                            ); ?></td>
                            <td><?php echo htmlspecialchars(
                                $datag["gejala"],
                            ); ?></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<footer class="footer bg-primary">
    <div class="container" style="text-align:center;">
        <p>Copyright 2025 Najmi Rahmi</p>
    </div>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>