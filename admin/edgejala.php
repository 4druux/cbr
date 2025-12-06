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
    <script type="text/javascript">
    function validasi(form){
        if(form.gejala.value === ""){
            alert("Masukkan Gejala..!");
            form.gejala.focus(); return false;
        }
        form.submit();
    }
    </script>
</head>
<?php
include "../koneksi.php";
$kdubah = $_REQUEST['kdubah'];
$kd_gejala = '';
$gejala = '';
if (!empty($kdubah)) {
    $stmt = $koneksi->prepare("SELECT * FROM gejala WHERE kd_gejala=?");
    $stmt->bind_param("s", $kdubah);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        $kd_gejala = $data['kd_gejala'];
        $gejala = $data['gejala'];
    }
}
?>
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
            <h3 class="panel-title">Edit Data Gejala</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <form id="form1" name="form1" onSubmit="return validasi(this);" method="post" action="edsimgejala.php" target="_self">
                        <div class="form-group">
                            <label>Kode Gejala</label>
                            <input class="form-control" name="kd_gejala" type="text" id="kd_gejala" value="<?php echo htmlspecialchars($kd_gejala); ?>" disabled="disabled">
                            <input name="kd_gejala2" type="hidden" id="kd_gejala2" value="<?php echo htmlspecialchars($kd_gejala); ?>">
                        </div>
                        <div class="form-group">
                            <label>Nama Gejala</label>
                            <input type="text" class="form-control" value="<?php echo htmlspecialchars($gejala); ?>" id="gejala" name="gejala" autofocus="">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-ok"></span> Update</button>
                            <a class="btn btn-danger" href="haladmin.php?top=gejala.php"><span class="glyphicon glyphicon-cencel"></span> Batal</a>
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