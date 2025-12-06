<?php session_start();
//
?>
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
    
    <link rel="stylesheet" href="css/general.css" type="text/css" media="screen" />
    
    <script type="text/javascript" src="script.js"></script>
    <script type="text/javascript">
    function direct_link(){
    //window.location.href="index.php?top=home.php";
    return false;
    }
    </script>
</head>

<body onload="direct_link();">
<?php include "koneksi.php"; ?>

<nav class="navbar navbar-default navbar-static-top">
     <div class="container">
       <div class="navbar-header">
       
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
       
         <a class="navbar-brand" href="index.php?top=home.php">Case Based Reasoning</a>
       </div>
       <div id="navbar" class="navbar-collapse collapse">
         <ul class="nav navbar-nav">
           <li><a href="index.php?top=pasien_add_fm.php"><span class="glyphicon glyphicon-stats"></span> Konsultasi</a></li>     
           <li><a href="index.php?top=info-penyakit.php"><span class="glyphicon glyphicon-info-sign"></span> Informasi</a></li>   
           <li><a href="index.php?top=daftar-penyakit.php"><span class="glyphicon glyphicon-tasks"></span> Kategori Status Gizi </a></li>   
           
<li><a href="toggle_theme.php?redirect=<?php echo urlencode(
    $_SERVER["REQUEST_URI"],
); ?>" title="Ganti Tema"><span class="glyphicon <?php echo $theme_icon; ?>"></span></a></li>           
           <li><a href="admin/index.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>            
                 
         </ul>         
       </div>
       </div>
   </nav>

<div class="container">
<?php
$top = $_GET["top"] ?? "";
if (empty($top)) {
    $on_top = "home.php";
    echo "<meta http-equiv='refresh' content='0; url=index.php?top=home.php'>";
} else {
    $on_top = $top;
    include "$on_top";
    //include "proses_diagnosa.php";
}
?>
</div>

<footer class="footer bg-primary">
     <div class="container" style="text-align:center;">
       <p>Copyright 2025 Najmi Rahmi</p>
     </div>
   </footer>

   
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>