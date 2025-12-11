<div class="page-header">
    <h1 class="entry-title"><span class="glyphicon glyphicon-user"></span> Data Pengguna</h1>
</div>
<div class="entry-content">
<script type="text/javascript">
$(document).ready(function(){
    $("#TxtNama").focus();
})

function validasi(form){
    if(form.TxtNama.value==""){
        alert("Masukkan Nama !");
        form.TxtNama.focus(); return false;
    }else if(form.cbojk.value==0){
        alert("Masukkan Jenis Kelamin !");
        form.cbojk.focus(); return false;   
    }else if(form.TxtUmur.value==""){
        alert("Pilih Umur Anda !");
        form.TxtUmur.focus(); return false;
    }else if(form.TxtAlamat.value==""){
        alert("Masukkan Alamat Anda !");
        form.TxtAlamat.focus(); return false;
    }else if(form.textemail.value==""){
        alert("Masukkan Email !");
        form.textemail.focus(); return false;
    }
    form.submit();
}
</script>
<div class="row">
    <div class="col-md-4"> 
<form onSubmit="return validasi(this)" method="post" name="form1" target="_self" action="?top=pasienaddsim.php">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" placeholder="Nama" id="TxtNama" name="TxtNama" autofocus="">
            </div>
            
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <select class="form-control" name="cbojk" id="cbojk">
                <option value="0" selected="selected">Jenis Kelamin</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Wanita">Wanita</option>
                </select>
            </div>
            
            <div class="form-group">
                <label>Umur</label>
                <select class="form-control" name="TxtUmur" id="TxtUmur">
                    <option value="" selected>Pilih Umur</option>
                    <option value="1">1 Tahun</option>
                    <option value="2">2 Tahun</option>
                    <option value="3">3 Tahun</option>
                    <option value="4">4 Tahun</option>
                    <option value="5">5 Tahun</option>
                </select>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" class="form-control" placeholder="Alamat" id="TxtAlamat" name="TxtAlamat">
            </div>
            
            <div class="form-group">
                <label>Alamat Email</label>
                <input type="text" class="form-control" placeholder="Email" id="textemail" name="textemail">
            </div>
            
            
            <div class="form-group">                
                <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-ok"></span> Mulai Konsultasi</button>
            </div>
</form>

     </div>
    </div>
</div>