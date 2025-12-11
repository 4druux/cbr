<?php
// $host = "localhost";
// $user = "u677683953_cbrgizi";
// $pass = "i1GruNr*Pr8>";
// $dbName = "u677683953_cbrgizi";

$host = "localhost";
$user = "root";
$pass = "";
$dbName = "gizi_cbr";

$koneksi = new mysqli($host, $user, $pass, $dbName);

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

$koneksi->set_charset("utf8");
?>
