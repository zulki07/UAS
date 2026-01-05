<?php
$host = "sql300.infinityfree.com";
$user = "if0_40746804";
$pass = "zulki0707";
$db   = "if0_40746804_pasien_db";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
