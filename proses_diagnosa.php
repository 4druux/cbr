<?php
include "koneksi.php";

// Hapus data tmp sebelumnya
$koneksi->query("DELETE FROM tmp_penyakit");

// Header halaman
echo "<div class='page-header'>
    <h1 class='entry-title'><span class='glyphicon glyphicon-stats'></span> Hasil Konsultasi</h1>
</div>";

// ===============================
// === PERHITUNGAN SIMILARITY ===
// ===============================

// Ambil semua penyakit dari tabel relasi
$querypenyakit = $koneksi->query("SELECT DISTINCT kd_penyakit FROM relasi");

while ($rowpenyakit = $querypenyakit->fetch_assoc()) {
    $kd_pen = $rowpenyakit["kd_penyakit"];

    // Total bobot penyakit
    $querySUM = $koneksi->query(
        "SELECT SUM(bobot) AS jumlahbobot FROM relasi WHERE kd_penyakit='$kd_pen'",
    );
    $resSUM = $querySUM->fetch_assoc();
    $SUMbobot = $resSUM["jumlahbobot"];

    $sum_numerator = 0;

    // Ambil semua gejala dari penyakit
    $query_gejala = $koneksi->query(
        "SELECT * FROM relasi WHERE kd_penyakit='$kd_pen'",
    );
    while ($row_gejala = $query_gejala->fetch_assoc()) {
        $kode_gejala_relasi = $row_gejala["kd_gejala"];
        $bobotRelasi = $row_gejala["bobot"];

        // Cek apakah gejala ini dipilih pasien
        $query_tmp_gejala = $koneksi->query(
            "SELECT * FROM tmp_gejala WHERE kd_gejala='$kode_gejala_relasi'",
        );
        $kemiripan = $query_tmp_gejala->num_rows > 0 ? 1 : 0;
        $sum_numerator += $bobotRelasi * $kemiripan;
    }

    // Rumus similarity: Σ(bobot*kemiripan) / Σ(bobot)
    $similarity = $SUMbobot != 0 ? $sum_numerator / $SUMbobot : 0;
    $koneksi->query(
        "INSERT INTO tmp_penyakit(kd_penyakit, nilai) VALUES ('$kd_pen', '$similarity')",
    );
}

// ===============================
// === HASIL DIAGNOSIS PASIEN ===
// ===============================

// Ambil data pasien terakhir
$query_pasien = $koneksi->query(
    "SELECT * FROM tmp_pasien ORDER BY id DESC LIMIT 1",
);
$data_pasien = $query_pasien->fetch_assoc();
?>

<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Identitas Anda</h3>
    </div>
    <div class="panel-body">
        <?php
        echo "Nama : " . htmlspecialchars($data_pasien["nama"]) . "<br>";
        echo "Jenis Kelamin : " .
            htmlspecialchars($data_pasien["kelamin"]) .
            "<br>";
        echo "Umur : " . htmlspecialchars($data_pasien["umur"]) . "<br>";
        echo "Alamat : " .
            htmlspecialchars($data_pasien["alamat"]) .
            "<br><br>";

        echo "<label>Gejala Yang Dialami :</label><br>";
        $query_gejala_input = $koneksi->query("SELECT g.gejala AS namagejala FROM gejala g 
                                               JOIN tmp_gejala t ON g.kd_gejala = t.kd_gejala");
        $no = 1;
        while ($row_gejala_input = $query_gejala_input->fetch_assoc()) {
            echo $no++ .
                ". " .
                htmlspecialchars($row_gejala_input["namagejala"]) .
                "<br>";
        }
        ?>
    </div>
</div>

<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Hasil Diagnosis</h3>
    </div>
    <div class="panel-body">
        <?php
        $query_sum_tmp = $koneksi->query(
            "SELECT * FROM tmp_penyakit WHERE nilai != 0 ORDER BY nilai DESC LIMIT 2",
        );
        while ($row_sumtmp = $query_sum_tmp->fetch_assoc()) {
            $kd_pen2 = $row_sumtmp["kd_penyakit"];
            $nilai = $row_sumtmp["nilai"];
            $persen = number_format($nilai * 100, 2);

            $query_penyasol = $koneksi->query(
                "SELECT * FROM penyakit_solusi WHERE kd_penyakit='$kd_pen2'",
            );
            while ($row_penyasol = $query_penyasol->fetch_assoc()) {
                echo "<strong>" .
                    htmlspecialchars($row_penyasol["nama_penyakit"]) .
                    " (" .
                    $persen .
                    "%)</strong><br>";
                echo "<p>" .
                    htmlspecialchars($row_penyasol["definisi"]) .
                    "</p>";
                echo "<p><strong>Solusi Pengobatan :</strong><br>" .
                    htmlspecialchars($row_penyasol["solusi"]) .
                    "</p><hr>";

                // Simpan hasil ke tabel analisa_hasil
                $nama = $data_pasien["nama"];
                $kelamin = $data_pasien["kelamin"];
                $umur = $data_pasien["umur"];
                $alamat = $data_pasien["alamat"];
                $tanggal = $data_pasien["tanggal"];

                $stmt_hasil = $koneksi->prepare(
                    "INSERT INTO analisa_hasil (nama, kelamin, umur, alamat, kd_penyakit, tanggal) VALUES (?, ?, ?, ?, ?, ?)",
                );
                $stmt_hasil->bind_param(
                    "ssisss",
                    $nama,
                    $kelamin,
                    $umur,
                    $alamat,
                    $kd_pen2,
                    $tanggal,
                );
                $stmt_hasil->execute();
            }
        }
        ?>
    </div>
</div>

<!-- Tombol Aksi -->
<a class="btn btn-primary" href="index.php?top=konsultasiFm.php">
    <span class="glyphicon glyphicon-refresh"></span> Ulang
</a>
<button class="btn btn-success" data-toggle="modal" data-target="#detailModal">
  <span class="glyphicon glyphicon-list-alt"></span> Detail Perhitungan
</button>

<!-- MODAL DETAIL PERHITUNGAN -->
<div class="modal right fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h4 class="modal-title" id="detailModalLabel">Detail Perhitungan Similarity</h4>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body" style="max-height:100dvh; overflow-y:auto;">
        <?php
        // ambil semua penyakit yang sudah dihitung
        $query_detail = $koneksi->query(
            "SELECT * FROM tmp_penyakit WHERE nilai != 0 ORDER BY nilai DESC",
        );
        while ($row_detail = $query_detail->fetch_assoc()) {
            $kd_penyakit = $row_detail["kd_penyakit"];

            // ambil info penyakit
            $qpen = $koneksi->query(
                "SELECT nama_penyakit, definisi FROM penyakit_solusi WHERE kd_penyakit='$kd_penyakit'",
            );
            $rpen = $qpen->fetch_assoc();

            echo "<div class='panel panel-info'>";
            echo "<div class='panel-heading'><strong>{$kd_penyakit} → {$rpen["nama_penyakit"]}</strong></div>";
            echo "<div class='panel-body'>";

            // ambil relasi dan total bobot
            $qrel = $koneksi->query("SELECT r.kd_gejala, g.gejala AS nama_gejala, r.bobot 
                                    FROM relasi r JOIN gejala g ON r.kd_gejala=g.kd_gejala
                                    WHERE r.kd_penyakit='$kd_penyakit'");
            $qsum = $koneksi->query(
                "SELECT SUM(bobot) AS jumlahbobot FROM relasi WHERE kd_penyakit='$kd_penyakit'",
            );
            $rsum = $qsum->fetch_assoc();
            $total_bobot = $rsum["jumlahbobot"];

            echo "<p><strong>Rumus Similarity:</strong> (Σ (Bobot * Kemiripan)) / Σ Bobot</p>";
            echo "<table class='table table-bordered table-sm'>
                    <thead>
                        <tr class='bg-info'>
                            <th>Kode Gejala</th>
                            <th>Nama Gejala</th>
                            <th>Bobot</th>
                            <th>Kemiripan (1/0)</th>
                            <th>Hasil (Bobot * Kemiripan)</th>
                        </tr>
                    </thead>
                    <tbody>";

            $sum_numerator = 0;
            while ($r = $qrel->fetch_assoc()) {
                $kode_g = $r["kd_gejala"];
                $nama_g = $r["nama_gejala"];
                $bobot = $r["bobot"];
                $qmatch = $koneksi->query(
                    "SELECT * FROM tmp_gejala WHERE kd_gejala='$kode_g'",
                );
                $kemiripan = $qmatch->num_rows > 0 ? 1 : 0;
                $hasil = $kemiripan * $bobot;
                $sum_numerator += $hasil;

                echo "<tr>
                        <td>$kode_g</td>
                        <td>" .
                    htmlspecialchars($nama_g) .
                    "</td>
                        <td>$bobot</td>
                        <td>$kemiripan</td>
                        <td>$hasil</td>
                      </tr>";
            }

            $similarity = $sum_numerator / $total_bobot;
            $similarity_percent = number_format($similarity * 100, 2);

            echo "</tbody></table>";
            echo "<p><strong>Perhitungan:</strong><br>";
            echo "Similarity = ($sum_numerator / $total_bobot) = " .
                number_format($similarity, 4) .
                "<br>";
            echo "Similarity (Tingkat Kemiripan) = <strong>{$similarity_percent}%</strong>";
            echo "</p><hr>";
            echo "</div></div>";
        }
        ?>
      </div>
    </div>
  </div>
</div>

<!-- Custom CSS untuk efek modal kanan -->
<style>
.modal.right .modal-dialog {
  position: fixed;
  right: 0;
  margin: 0;
  top: 0;
  bottom: 0;
  height: 100%;
  transform: translate3d(100%, 0, 0);
  transition: transform 0.4s ease-in-out;
}
.modal.right.fade.in .modal-dialog {
  transform: translate3d(0, 0, 0);
}
@media (min-width: 768px) {
  .modal.right .modal-dialog {
    width: 45%; /* Desktop lebar 45% */
  }
}
@media (max-width: 767px) {
  .modal.right .modal-dialog {
    width: 100%; /* Mobile fullscreen */
  }
}
</style>
