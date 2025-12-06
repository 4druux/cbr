<div class="page-header">
    <h1 class="entry-title"><span class="glyphicon glyphicon-tasks"></span> Kategori Status Gizi Pada Balita</h1>
</div>
<div class="entry-content">
<?php 
$sql = "SELECT * FROM penyakit_solusi ORDER BY kd_penyakit";
$qry = $koneksi->query($sql) or die ("SQL Error: " . $koneksi->error);
while ($data = $qry->fetch_assoc()) {
?>
<div class="panel panel-primary" style="text-align:justify;">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $data['nama_penyakit'];?></h3>
    </div>
    <div class="panel-body">
        <p><?php echo $data['definisi'];?></p><br>
        <p>Solusi :<p><?php echo $data['solusi'];?></p></p>
    </div>
</div>
<?php
}
?>
</div>