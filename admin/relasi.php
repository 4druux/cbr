<script type="text/javascript">
function konfirmasi(id_relasi) {
    var url_str = "hapus_relasi.php?id_relasi=" + encodeURIComponent(id_relasi);
    var r = confirm("Yakin ingin menghapus data ?");
    if (r === true) {
        window.location = url_str;
    }
}
</script>

<?php include "../koneksi.php"; ?>

<div class="page-header">
    <h1 class="entry-title"><span class="glyphicon glyphicon-refresh"></span> Data Relasi</h1>
</div>

<div class="panel panel-primary" style="text-align:justify;">
    <div class="panel-heading">
        <h3 class="panel-title">Tambah Data Relasi</h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-12 col-md-6">

                <form id="form1" name="form1" method="post" action="relasisim.php" enctype="multipart/form-data">

                    <div class="form-group">
                        <label>Kategori Status Gizi</label>
                        <select class="form-control" name="TxtKdPenyakit" id="TxtKdPenyakit">
                            <option value="NULL">Jenis Status Gizi</option>
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
                    </div>

                    <div class="form-group">
                        <label>Gejala</label>
                        <select class="form-control" name="TxtKdGejala" id="TxtKdGejala">
                            <option value="NULL">Gejala</option>
                            <?php
                            $sqlg = "SELECT * FROM gejala ORDER BY kd_gejala";
                            ($qryg = $koneksi->query($sqlg)) or
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
                        <label>Bobot Gejala</label>
                        <select class="form-control" name="txtbobot" id="txtbobot">
                            <option value="0">Bobot Gejala</option>
                            <option value="5">5 Gejala Dominan</option>
                            <option value="3">3 Gejala Sedang</option>
                            <option value="1">1 Gejala Biasa</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">
                            <span class="glyphicon glyphicon-ok"></span> Simpan
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>


<div class="panel panel-primary" style="text-align:justify;">
    <div class="panel-heading">
        <h3 class="panel-title">Data Relasi</h3>
    </div>

    <div class="panel-body">
        <div class="table-responsive">

            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr align="center">
                        <td width="50"><strong>No</strong></td>
                        <td width="100"><strong>Kode Gejala</strong></td>
                        <td><strong>Gejala</strong></td>
                        <td width="80"><strong>Bobot</strong></td>
                        <td width="150"><strong>Jenis Status Gizi</strong></td>
                        <td width="100"><strong>Aksi</strong></td>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $sql = "SELECT 
                                r.id_relasi,
                                r.kd_gejala,
                                g.gejala,
                                r.bobot,
                                p.kd_penyakit,
                                p.nama_penyakit
                            FROM relasi r
                            JOIN gejala g ON r.kd_gejala = g.kd_gejala
                            JOIN penyakit_solusi p ON r.kd_penyakit = p.kd_penyakit
                            ORDER BY p.kd_penyakit, r.kd_gejala";

                    ($qry = $koneksi->query($sql)) or
                        die("SQL Error: " . $koneksi->error);
                    $no = 0;

                    while ($data = $qry->fetch_assoc()) {
                        $no++; ?>

                    <tr align="center">
                        <td><?= $no ?></td>
                        <td><?= htmlspecialchars($data["kd_gejala"]) ?></td>
                        <td align="left"><?= htmlspecialchars(
                            $data["gejala"],
                        ) ?></td>
                        <td><?= htmlspecialchars($data["bobot"]) ?></td>
                        <td><?= htmlspecialchars($data["kd_penyakit"]) ?> -
                            <?= htmlspecialchars($data["nama_penyakit"]) ?>
                        </td>

                        <td>
                            <a class="btn btn-xs btn-warning"
                               href="haladmin.php?top=edit_relasi.php&id_relasi=<?= htmlspecialchars(
                                   $data["id_relasi"],
                               ) ?>"
                               title="Edit Relasi">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a>

                            <a class="btn btn-xs btn-danger"
                               style="cursor:pointer;"
                               onclick="return konfirmasi('<?= htmlspecialchars(
                                   $data["id_relasi"],
                               ) ?>');"
                               title="Hapus Relasi">
                                <span class="glyphicon glyphicon-trash"></span>
                            </a>
                        </td>
                    </tr>

                    <?php
                    }
                    ?>
                </tbody>

            </table>

        </div>
    </div>

</div>

</body>
</html>
