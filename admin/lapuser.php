<?php
include "../koneksi.php";

$search_term = "";
$search_query_param = "";

if (isset($_GET["search"]) && !empty($_GET["search"])) {
    $search_term = $_GET["search"];
    $search_query_param = "%" . $search_term . "%";
}
?>
<script type="text/javascript">
    function konfirmasi(id_user) {
        var url_str = "hapus_user.php?id_user=" + encodeURIComponent(id_user);
        var r = confirm("Yakin ingin menghapus data ?");
        if (r === true) {
            window.location = url_str;
        }
    }
</script>
<div class="page-header">
    <h1 class="entry-title"><span class="glyphicon glyphicon-user"></span> Laporan User</h1>
</div>
<div class="panel panel-primary" style="text-align:justify;">
    <div class="panel-heading">
        <h3 class="panel-title">Daftar User</h3>
    </div>
    <div class="panel-body">

<div class="row">
    <div class="col-md-6 col-md-offset-6 col-sm-12 col-sm-offset-0">
        <form action="" method="GET" style="margin-bottom: 20px;">

            <input type="hidden" name="top" value="<?php echo htmlspecialchars(
                $_GET["top"] ?? "lapuser.php",
            ); ?>">

            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari Nama, Kelamin, Alamat..." 
                       value="<?php echo htmlspecialchars($search_term); ?>">
                
                <?php if (!empty($search_term)): ?>
                <span class="input-group-btn">
                    <a href="?top=<?php echo htmlspecialchars(
                        $_GET["top"] ?? "lapuser.php",
                    ); ?>" class="btn btn-default" title="Clear Filter">
                        <span class="glyphicon glyphicon-remove"></span>
                    </a>
                </span>
                <?php endif; ?>

                <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search"></span> Cari</button>
                </span>
            </div>
        </form>
    </div>
</div>
        
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr style="text-align:center;font-weight:bold;">
                        <td>No</td>
                        <td>Nama</td>
                        <td>Kelamin</td>
                        <td>Umur</td>
                        <td>Alamat</td>
                        <td> Jenis Status Gizi </td>
                        <td>Tanggal Diagnosa</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <?php
                $sql = "SELECT * FROM analisa_hasil, penyakit_solusi 
                        WHERE analisa_hasil.kd_penyakit=penyakit_solusi.kd_penyakit";

                if (!empty($search_query_param)) {
                    $sql .=
                        " AND (analisa_hasil.nama LIKE ? OR analisa_hasil.alamat LIKE ? OR penyakit_solusi.nama_penyakit LIKE ? OR analisa_hasil.kelamin LIKE ?)";
                }

                $sql .= " ORDER BY id";

                $stmt = $koneksi->prepare($sql);

                if (!$stmt) {
                    die("SQL Error (prepare): " . $koneksi->error);
                }

                if (!empty($search_query_param)) {
                    $stmt->bind_param(
                        "ssss",
                        $search_query_param,
                        $search_query_param,
                        $search_query_param,
                        $search_query_param,
                    );
                }

                $stmt->execute();

                $qry = $stmt->get_result();

                $no = 0;
                while ($data = $qry->fetch_assoc()) {
                    $no++; ?>
                <tr>
                    <td style="text-align:center;"><?php echo $no; ?></td>
                    <td><?php echo htmlspecialchars($data["nama"]); ?></td>
                    <td style="text-align:center;"><?php echo htmlspecialchars(
                        $data["kelamin"],
                    ); ?></td>
                    <td style="text-align:center;"><?php echo htmlspecialchars(
                        $data["umur"],
                    ); ?></td>
                    <td><?php echo htmlspecialchars($data["alamat"]); ?></td>
                    <td><?php echo htmlspecialchars(
                        $data["nama_penyakit"],
                    ); ?> ( <?php echo htmlspecialchars(
     $data["kd_penyakit"],
 ); ?> )</td>
                    <td><?php echo htmlspecialchars($data["tanggal"]); ?></td>
                    <td style="text-align:center;">
                        <a class="btn btn-xs btn-danger" title="hapus pengguna" style="cursor:pointer;" onClick="return konfirmasi('<?php echo htmlspecialchars(
                            $data["id"],
                        ); ?>')"><span class="glyphicon glyphicon-trash"></span></a>
                    </td>
                </tr>
                <?php
                }

                if ($no == 0) {
                    echo '<tr><td colspan="8" class="text-center">Data tidak ditemukan.</td></tr>';
                }

                $stmt->close();
                ?>
            </table>
        </div> </div>
</div>