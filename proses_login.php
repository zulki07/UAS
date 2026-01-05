<?php
session_start();
include 'koneksi.php';

$user = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$user' AND password='$password'");

if(mysqli_num_rows($query) > 0){
    $_SESSION['login'] = true;
    header("Location: dashboard.php");
    exit;
}else{
    echo "Login gagal. Username atau password salah.";
}
?>
