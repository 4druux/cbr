<?php
include "../koneksi.php";

if (!isset($_GET["id_relasi"])) {
    die("ID relasi tidak ditemukan!");
}

$id_relasi = $_GET["id_relasi"];

$sql_rel = "SELECT * FROM relasi WHERE id_relasi='$id_relasi' LIMIT 1";
$q_rel = $koneksi->query($sql_rel);

if ($q_rel->num_rows == 0) {
    die("Data relasi tidak ditemukan!");
}

$data_rel = $q_rel->fetch_assoc();

$kdsakit = $data_rel["kd_penyakit"];
$kdgejala = $data_rel["kd_gejala"];
$bobot = $data_rel["bobot"];
?>


<div class="panel panel-primary" style="text-align:justify;">
    <div class="panel-heading">
        <h3 class="panel-title">Edit Data Relasi</h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">
                <form id="form1" name="form1" method="post" action="update_relasi.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Kategori Status Gizi</label>
                        <select class="form-control" name="TxtKdPenyakit" id="TxtKdPenyakit">
                            <option value="NULL">Status Gizi</option>
                            <?php
                            $sqlp =
                                "SELECT * FROM penyakit_solusi ORDER BY kd_penyakit";
                            ($qryp = $koneksi->query($sqlp)) or
                                die("SQL Error: " . $koneksi->error);
                            while ($datap = $qryp->fetch_assoc()) {
                                $cek =
                                    $datap["kd_penyakit"] == $kdsakit
                                        ? "selected"
                                        : "";
                                echo "<option value='" .
                                    htmlspecialchars($datap["kd_penyakit"]) .
                                    "' $cek>" .
                                    htmlspecialchars($datap["kd_penyakit"]) .
                                    " " .
                                    htmlspecialchars($datap["nama_penyakit"]) .
                                    "</option>";
                            }
                            ?>
                        </select>
                        <input name="textrelasi" type="hidden" value="<?php echo htmlspecialchars(
                            $_GET["id_relasi"],
                        ); ?>" />
                    </div>
                    <div class="form-group">
                        <label>Gejala</label>
                        <select class="form-control" name="TxtKdGejala" id="TxtKdGejala">
                            <option value="NULL">Gejala</option>
                            <?php
                            $sqlp = "SELECT * FROM gejala ORDER BY kd_gejala";
                            ($qryg = $koneksi->query($sqlp)) or
                                die("SQL Error: " . $koneksi->error);
                            while ($datag = $qryg->fetch_assoc()) {
                                $cek =
                                    $datag["kd_gejala"] == $kdgejala
                                        ? "selected"
                                        : "";
                                echo "<option value='" .
                                    htmlspecialchars($datag["kd_gejala"]) .
                                    "' $cek>" .
                                    htmlspecialchars($datag["kd_gejala"]) .
                                    " " .
                                    htmlspecialchars($datag["gejala"]) .
                                    "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Bobot Status Gizi</label>
                        <select class="form-control" name="txtbobot" id="txtbobot">
    <option value="5" <?php if($bobot == 5) echo 'selected'; ?>>5 Gejala Dominan</option>
    <option value="3" <?php if($bobot == 3) echo 'selected'; ?>>3 Gejala Sedang</option>
    <option value="1" <?php if($bobot == 1) echo 'selected'; ?>>1 Gejala Biasa</option>
</select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-ok"></span> Update</button>
                        <a class="btn btn-danger" href="haladmin.php?top=relasi.php"><span class="glyphicon glyphicon-cencel"></span> Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>