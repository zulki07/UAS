<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM pasien WHERE id='$id'"));
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Pasien</title>
    <style>
        @import url('style.css');
    </style>
</head>
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
        <h2>Edit Data Pasien</h2>
        <p>Rumah Sakit UNIPDU</p>
    </div>

    <div class="content">
        <form action="update.php" method="POST">
            <input type="hidden" name="id" value="<?= $data['id'] ?>">

            <label>Nama</label>
            <input type="text" name="nama" value="<?= $data['nama'] ?>" required>

            <label>Umur</label>
            <input type="number" name="umur" value="<?= $data['umur'] ?>" required>

            <label>Alamat</label>
            <textarea name="alamat" required><?= $data['alamat'] ?></textarea>

            <label>Ruang</label>
            <input type="number" name="ruang" value="<?= $data['ruang'] ?>" required>

            <label>Penyakit</label>
            <input type="text" name="penyakit" value="<?= $data['penyakit'] ?>" required>

            <button type="submit">Update</button>
        </form>
    </div>

