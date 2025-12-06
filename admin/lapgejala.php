<?php
include "../koneksi.php"; ?>
<div class="page-header">
    <h1 class="entry-title"><span class="glyphicon glyphicon-print"></span> Laporan Gejala</h1>
</div>
<div class="panel panel-primary" style="text-align:justify;">
    <div class="panel-heading">
        <h3 class="panel-title">Tampilkan Laporan Per Kategori Status Gizi</h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">
                <form name="form1" method="GET" action="haladmin.php">
    
    <input type="hidden" name="top" value="lapgejala2.php">
    
    <div class="form-group">
        <label>Kategori Status Gizi</label>
        <select class="form-control" name="CmbPenyakit">
            <?php
            $sqlp = "SELECT * FROM penyakit_solusi ORDER BY kd_penyakit";
            ($qryp = $koneksi->query($sqlp)) or
                die("SQL Error: " . $koneksi->error);
            while ($datap = $qryp->fetch_assoc()) {
                $cek = $datap["kd_penyakit"] == $kdsakit ? "selected" : "";
                echo "<option value='" .
                    htmlspecialchars($datap["kd_penyakit"]) .
                    "' $cek>" .
                    htmlspecialchars($datap["nama_penyakit"]) .
                    " (" .
                    htmlspecialchars($datap["kd_penyakit"]) .
                    ")</option>";
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-ok"></span> Tampil</button>
    </div>
</form>
            </div>
        </div>
    </div>
</div>