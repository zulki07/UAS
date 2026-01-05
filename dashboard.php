<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="style.css">
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
            <h2>Data Pasien</h2>
            <p>Sistem Informasi Rumah Sakit UNIPDU</p>
        </div>

        <div class="content">
            <table>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Umur</th>
                    <th>Alamat</th>
                    <th>Ruang</th>
                    <th>Penyakit</th>
                    <th>Aksi</th>
                </tr>

                <?php
                $no = 1;
                $data = mysqli_query($koneksi, "SELECT * FROM pasien");
                while ($d = mysqli_fetch_assoc($data)) {
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $d['nama'] ?></td>
                    <td><?= $d['umur'] ?></td>
                    <td><?= $d['alamat'] ?></td>
                    <td><?= $d['ruang'] ?></td>
                    <td><?= $d['penyakit'] ?></td>
                    <td>
                        <a class="btn-edit" href="edit.php?id=<?= $d['id'] ?>">Edit</a>
                        <a class="btn-hapus" href="hapus.php?id=<?= $d['id'] ?>">Hapus</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>

    </div>
</div>

</body>
</html>
