<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

if (isset($_POST['tambah'])) {
    $nama     = $_POST['nama'];
    $umur     = $_POST['umur'];
    $alamat   = $_POST['alamat'];
    $ruang    = $_POST['ruang'];
    $penyakit = $_POST['penyakit'];

    $query = mysqli_query($koneksi,
        "INSERT INTO pasien (nama, umur, alamat, ruang, penyakit)
         VALUES ('$nama', '$umur', '$alamat', '$ruang', '$penyakit')"
    );

    if ($query) {
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Gagal menyimpan data";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Pasien</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="wrapper">
    <div class="sidebar">
        <h2>RS UNIPDU</h2>
        <a href="dashboard.php">🏠 Dashboard</a>
        <a href="tambah.php">➕ Tambah Pasien</a>
        <a href="dashboard_dokter.php">📅 Jadwal Dokter</a>
        <a href="apotek.php">💊 Apotek</a>
        <a href="logout.php">🚪 Logout</a>
    </div>
    <div class="main">

        <div class="header">
            <h2>Tambah Data Pasien</h2>
            <p>Sistem Informasi Rumah Sakit UNIPDU</p>
        </div>

        <div class="content">
            <form method="post">
                <label>Nama</label>
                <input type="text" name="nama" required>

                <label>Umur</label>
                <input type="number" name="umur" required>

                <label>Alamat</label>
                <textarea name="alamat" required></textarea>

                <label>Ruang</label>
                <input type="number" name="ruang" required>

                <label>Penyakit</label>
                <input type="text" name="penyakit" required>

                <button type="submit" name="tambah">Tambah</button>
            </form>
        </div>

    </div>
</div>

</body>
</html>
