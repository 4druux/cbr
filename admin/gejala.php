<script type="text/javascript">
function validasi(form) {
    if (form.kd_gejala.value === "") {
        alert("Masukkan kode gejala..!");
        form.kd_gejala.focus();
        return false;
    } else if (form.gejala.value === "") {
        alert("Masukkan gejala..!");
        form.gejala.focus();
        return false;
    }
    form.submit();
}
function konfirmasi(kd_gejala) {
    var url_str = "hpsgejala.php?kdhapus=" + encodeURIComponent(kd_gejala);
    var r = confirm("Yakin ingin menghapus data ?");
    if (r === true) {
        window.location = url_str;
    }
}
</script>

<div class="page-header">
    <h1 class="entry-title"><span class="glyphicon glyphicon-briefcase"></span> Data Gejala</h1>
</div>
<div class="panel panel-primary" style="text-align:justify;">
    <div class="panel-heading">
        <h3 class="panel-title">Tambah Data Gejala</h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">
                <form name="form3" onSubmit="return validasi(this);" method="post" action="simpangejala.php">
                    <div class="form-group">
                        <label>Kode Gejala</label>
                        <input type="text" class="form-control" placeholder="Kode Gejala" id="kd_gejala" name="kd_gejala" autofocus="">
                    </div>
                    <div class="form-group">
                        <label>Nama Gejala</label>
                        <input type="text" class="form-control" placeholder="Nama Gejala" id="gejala" name="gejala" autofocus="">
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
        <h3 class="panel-title">Data Gejala Status Gizi</h3>
    </div>
    <div class="panel-body">
        <table class="table table-bordered table-hover table-striped">
            <tr align="center">
                <td width="85"><strong>Kode Gejala</strong></td>
                <td width="505"><strong>Gejala</strong></td>
                <td width="100"><strong>Aksi</strong></td>
            </tr>
            <?php
            include "../koneksi.php";
            $sql = "SELECT * FROM gejala ORDER BY kd_gejala";
            $qry = $koneksi->query($sql) or die ("SQL Error: " . $koneksi->error);
            while ($data = $qry->fetch_assoc()) {
            ?>
            <tr>
                <td style="text-align:center;"><?php echo htmlspecialchars($data['kd_gejala']); ?></td>
                <td><?php echo htmlspecialchars($data['gejala']); ?></td>
                <td style="text-align:center;">
                    <a class="btn btn-xs btn-warning" title="Edit Gejala" href="edgejala.php?kdubah=<?php echo htmlspecialchars($data['kd_gejala']);?>"><span class="glyphicon glyphicon-edit"></span></a>
                    <a class="btn btn-xs btn-danger" title="Hapus Gejala" style="cursor:pointer;" onclick="return konfirmasi('<?php echo htmlspecialchars($data['kd_gejala']);?>');"><span class="glyphicon glyphicon-trash"></span></a>
                </td>
            </tr>
            <?php
            }
            ?>
        </table>
    </div>
</div>