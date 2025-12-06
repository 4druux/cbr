<?php session_start(); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">

<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Sistem Pakar Metode Case Based Reasoning</title>
    <meta name="description" content="Description" />
    <meta name="keywords" content="Keywords" />
   <?php
   $theme = $_SESSION["theme"] ?? "dark";

   $theme_icon =
       $theme == "dark" ? "glyphicon-certificate" : "glyphicon-adjust";
   ?>

    <?php if ($theme == "light"): ?>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" media="screen" />
    <?php else: ?>
        <link rel="stylesheet" href="https://bootswatch.com/3/darkly/bootstrap.min.css" type="text/css" media="screen" />
    <?php endif; ?>
    
    <link rel="stylesheet" href="../css/general.css" type="text/css" media="screen" />

</head>
<body>
<nav class="navbar navbar-default navbar-static-top">
     <div class="container">
       <div class="navbar-header">
       
         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
             <span class="sr-only">Toggle navigation</span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
         </button>
       
         <a class="navbar-brand" href="../index.php?top=home.php">Case Based Reasoning</a>
       </div>
       <div id="navbar" class="navbar-collapse collapse">
         <ul class="nav navbar-nav">
           <li><a href="../index.php?top=pasien_add_fm.php"><span class="glyphicon glyphicon-stats"></span> Konsultasi</a></li>     
           <li><a href="../index.php?top=info-penyakit.php"><span class="glyphicon glyphicon-info-sign"></span> Informasi</a></li>   
           <li><a href="../index.php?top=daftar-penyakit.php"><span class="glyphicon glyphicon-tasks"></span> Kategori Status Gizi</a></li>   
           
           <li><a href="../toggle_theme.php" title="Ganti Tema"><span class="glyphicon <?php echo $theme_icon; ?>"></span></a></li>
           
           <li><a href="../admin/index.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>            
                 
         </ul>         
       </div>
       </div>
   </nav>
 
<div class="container">

<div class="page-header">
    <h1 class="entry-title"><span class="glyphicon glyphicon-log-in"></span> Login Admin</h1>
</div>
<div class="entry-content">
<div class="row">
    <div class="col-md-4">
<form name="form1" method="post" onSubmit="return validasi(this)" action="cekpswd.php" >
      <div class="form-group">
              <label>Username</label>
              <input type="text" class="form-control" placeholder="Username" id="username" name="username">
            </div>
      
      <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" placeholder="Password" id="password" name="password">
            </div>

<div class="form-group">            
              <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-log-in"></span> Masuk</button>
            </div>

    </form>
 
</div>
</div>
</div>
</div>


<footer class="footer bg-primary">
     <div class="container" style="text-align:center;">
       <p>Copyright 2025 Najmi Rahmi</p>
     </div>
   </footer>
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
  $("#username").focus();
  })
  function validasi(form){
    if(form.username.value==""){
      alert("Masukkan Username !");
      form.username.focus();
      return false;
      }else if(form.password.value==""){
        alert("Masukkan Password Anda !");
        form.password.focus();
        return false;
        }
      form.submit();
    }
</script>

</body>
</html>