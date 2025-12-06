<script type="text/javascript">
$(document).ready(function() {
    $("#kd_penyakit").focus();
});
function validasi(form) {
    if (form.kd_penyakit.value === "") {
        alert("Masukkan Kode Penyakit !");
        form.kd_penyakit.focus();
        return false;
    } else if (form.nama_penyakit.value === "") {
        alert("Masukkan Nama Penyakit !");
        form.nama_penyakit.focus();
        return false;
    } else if (form.definisi.value === "") {
        alert("Masukkan Definisi Penyakit !");
        form.definisi.focus();
        return false;
    } else if (form.solusi.value === "") {
        alert("Masukkan Solusi Penyakit !");
        form.solusi.focus();
        return false;
    }
}
function konfirmasi(kd_penyakit) {
    var url_str = "hpspenyakit.php?kdhapus=" + encodeURIComponent(kd_penyakit);
    var r = confirm("Yakin ingin menghapus data ?");
    if (r === true) {
        window.location = url_str;
    }
}
</script>
<div class="page-header">
    <h1 class="entry-title"><span class="glyphicon glyphicon-folder-close"></span> Data Kategori Status Gizi</h1>
</div>
<div class="panel panel-primary" style="text-align:justify;">
    <div class="panel-heading">
        <h3 class="panel-title">Tambah Data Kategori Status Gizi</h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <form name="form3" method="post" onSubmit="return validasi(this);" action="simpanpenyakit.php">
                    <div class="form-group">
                        <label>Kode Status Gizi</label>
                        <input type="text" class="form-control" placeholder="Kode Penyakit" id="kd_penyakit" name="kd_penyakit">
                    </div>
                    <div class="form-group">
                        <label> Jenis Status Gizi </label>
                        <input type="text" class="form-control" placeholder="Nama Penyakit" id="nama_penyakit" name="nama_penyakit">
                    </div>
                    <div class="form-group">
                        <label>Definisi</label>
                        <textarea class="form-control" name="definisi" id="definisi" rows="2" cols="70"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Solusi</label>
                        <textarea class="form-control" name="solusi" id="solusi" rows="2" cols="70"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-ok"></span> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="panel panel-primary" style="text-align:justify;">
    <div class="panel-heading">
        <h3 class="panel-title">Data Kategori Status Gizi</h3>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead> <tr style="text-align:center;">
                        <td><strong>No.</strong></td>
                        <td><strong>Kode Status Gizi</strong></td>
                        <td><strong> Jenis Status Gizi</strong></td>
                        <td><strong>Definisi</strong></td>
                        <td><strong>Solusi</strong></td>
                        <td><strong>Aksi</strong></td>
                    </tr>
                </thead>
                <tbody> <?php
                include "../koneksi.php";
                $sql = "SELECT * FROM penyakit_solusi ORDER BY kd_penyakit";
                ($qry = $koneksi->query($sql)) or
                    die("SQL Error: " . $koneksi->error);
                $no = 0;
                while ($data = $qry->fetch_assoc()) {
                    $no++; ?>
                    <tr valign="baseline">
                        <td style="text-align:center;"><?php echo $no; ?></td>
                        <td><?php echo htmlspecialchars(
                            $data["kd_penyakit"],
                        ); ?></td>
                        <td><?php echo htmlspecialchars(
                            $data["nama_penyakit"],
                        ); ?></td>
                        <td><?php echo htmlspecialchars(
                            $data["definisi"],
                        ); ?></td>
                        <td><?php echo htmlspecialchars(
                            $data["solusi"],
                        ); ?></td>
                        <td style="text-align:center;">
                            <a class="btn btn-xs btn-warning" title="Edit Penyakit" href="edpenyakit.php?kdubah=<?php echo htmlspecialchars(
                                $data["kd_penyakit"],
                            ); ?>"><span class="glyphicon glyphicon-edit"></span></a>
                            <a title="Hapus Penyakit" class="btn btn-xs btn-danger" onclick="return konfirmasi('<?php echo htmlspecialchars(
                                $data["kd_penyakit"],
                            ); ?>');"><span class="glyphicon glyphicon-trash"></span></a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div> </div>
</div>