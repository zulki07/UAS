<?php
$host = "sql104.infinityfree.com";
$user = "if0_40747095";
$pass = "vTkkFA3MWMkYv";
$db   = "if0_40747095_pasein_db";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>

