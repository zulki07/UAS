<?php
session_start();
include 'koneksi.php';
?>

<h2>Dashboard Dokter</h2>

<h3>Jadwal Praktik</h3>
<table border="1">
<tr>
    <th>Nama</th>
    <th>Keahlian</th>
    <th>Hari</th>
    <th>Jam</th>
</tr>

<?php
$data = mysqli_query($koneksi,"SELECT * FROM dokter");
while($d = mysqli_fetch_assoc($data)){
?>
<tr>
    <td><?= $d['nama_dokter'] ?></td>
    <td><?= $d['keahlian'] ?></td>
    <td><?= $d['hari_praktik'] ?></td>
    <td><?= $d['jam_praktik'] ?></td>
</tr>
<?php } ?>
</table>
