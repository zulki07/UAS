<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Dokter</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="wrapper">

    <div class="sidebar">
        <h2>DOKTER</h2>
        <a href="dashboard.php">🏠 Dashboard</a>
        <a href="tambah.php">➕ Tambah Pasien</a>
        <a href="dashboard_dokter.php">📅 Jadwal Dokter</a>
        <a href="apotek.php">💊 Apotek</a>
        <a href="logout.php">🚪 Logout</a>
    </div>

    <div class="main">

        <div class="header">
            <h2>Jadwal Praktik Dokter</h2>
            <p>Rumah Sakit UNIPDU</p>
        </div>

        <div class="content">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Dokter</th>
                        <th>Keahlian</th>
                        <th>Hari Praktik</th>
                        <th>Jam Praktik</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                $jadwal = mysqli_query($koneksi, "SELECT * FROM jadwal_dokter");

                if (mysqli_num_rows($jadwal) > 0) {
                    while ($data = mysqli_fetch_assoc($jadwal)) {
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $data['nama_dokter']; ?></td>
                        <td><?= $data['keahlian']; ?></td>
                        <td><?= $data['hari_praktik']; ?></td>
                        <td><?= $data['jam_praktik']; ?></td>
                    </tr>
                <?php
                    }
                } else {
                ?>
                    <tr>
                        <td colspan="5">Data jadwal dokter belum ada</td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
</div>

</body>
</html>
