<?php
include "../koneksi.php";
$kdubah = $_GET['kdubah'];
$in_id_penyakit = '';
$in_penyakit = '';
$in_definisi = '';
$in_solusi = '';
if (!empty($kdubah)) {
    $stmt = $koneksi->prepare("SELECT * FROM penyakit_solusi WHERE kd_penyakit = ?");
    $stmt->bind_param("s", $kdubah);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        $in_id_penyakit = $data['kd_penyakit'];
        $in_penyakit = $data['nama_penyakit'];
        $in_definisi = $data['definisi'];
        $in_solusi = $data['solusi'];
    }
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
    <link rel="stylesheet" href="../css/darkly-bootstrap.min.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="../css/general.css" type="text/css" media="screen" />
</head>
<body>
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="haladmin.php?top=home.php">Case Based Reasoning</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="haladmin.php?top=penyakit_solusi.php"><span class="glyphicon glyphicon-folder-close"></span> Kategori Status Gizi</a></li>
                <li><a href="haladmin.php?top=gejala.php"><span class="glyphicon glyphicon-briefcase"></span> Data Gejala</a></li>
                <li><a href="haladmin.php?top=relasi.php"><span class="glyphicon glyphicon-refresh"></span> Data Relasi</a></li>
                <li><a href="haladmin.php?top=lapgejala.php"><span class="glyphicon glyphicon-print"></span> Laporan Gejala</a></li>
                <li><a href="haladmin.php?top=lapuser.php"><span class="glyphicon glyphicon-user"></span> Laporan User</a></li>
                <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="panel panel-primary" style="text-align:justify;">
        <div class="panel-heading">
            <h3 class="panel-title">Edit Data Kategori Status Gizi</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <form id="form1" name="form1" method="post" action="edsimpenyakit.php">
                        <div class="form-group">
                            <label>Kode Status Gizi</label>
                            <input class="form-control" type="text" value="<?php echo htmlspecialchars($in_id_penyakit);?>" disabled="disabled">
                            <input class="form-control" name="kd_penyakit" type="hidden" id="kd_penyakit" value="<?php echo htmlspecialchars($in_id_penyakit);?>">
                        </div>
                        <div class="form-group">
                            <label>Kategori Status Gizi</label>
                            <input type="text" class="form-control" value="<?php echo htmlspecialchars($in_penyakit);?>" id="in_penyakit" name="in_penyakit" autofocus="">
                        </div>
                        <div class="form-group">
                            <label>Definisi</label>
                            <textarea class="form-control" name="in_definisi" id="in_definisi" rows="5" cols="70"><?php echo htmlspecialchars($in_definisi);?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Solusi</label>
                            <textarea class="form-control" name="in_solusi" id="in_solusi" rows="5" cols="70"><?php echo htmlspecialchars($in_solusi);?></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-ok"></span> Update</button>
                            <a class="btn btn-danger" href="haladmin.php?top=penyakit_solusi.php"><span class="glyphicon glyphicon-cencel"></span> Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="footer bg-primary">
    <div class="container" style="text-align:center;">
        <p>Copyright 2025 Najmi Rahmi</p>
    </div>
</footer>
</body>
</html>