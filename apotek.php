<?php
session_start();
include 'koneksi.php';

/* PROSES TAMBAH OBAT */
if(isset($_POST['simpan'])){
    mysqli_query($koneksi,"INSERT INTO apotek VALUES(
        '',
        '$_POST[nama_obat]',
        '$_POST[jenis]',
        '$_POST[stok]'
    )");
    header("Location: apotek.php");

}
/* PROSES UPDATE STOK OBAT */
if(isset($_POST['update_stok'])){
    $id = $_POST['id'];
    $stok = $_POST['stok_baru'];

    mysqli_query($koneksi, "UPDATE apotek SET stok='$stok' WHERE id='$id'");
    header("Location: apotek.php");
}

/* AMBIL DATA OBAT */
$data = mysqli_query($koneksi,"SELECT * FROM apotek");
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Dashboard Apotek</title>

<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="wrapper">
    <div class="sidebar">
        <h2>APOTEK</h2>
        <a href="dashboard.php">🏠 Dashboard</a>
        <a href="apotek.php">💊 Data Obat</a>
        <a href="logout.php">🚪 Logout</a>
    </div>

    <div class="main">
        <div class="header">
            <h2>Data Obat Apotek</h2>
            <p>Rumah Sakit UNIPDU</p>
        </div>

        <div class="content">
            <h3>➕ Tambah Obat</h3>
            <form method="post">
                
                <label>Nama Obat</label>
                <input type="text" name="nama_obat" required>

                <label>Jenis</label>
                <input type="text" name="jenis" required>

                <label>Stok</label>
                <input type="number" name="stok" required>

                <button name="simpan">Simpan</button>
            </form>
        </div>

    
        <div class="content">
            <table>
                <table>
    <tr>
        <th>No</th>
        <th>Nama Obat</th>
        <th>Jenis</th>
        <th>Stok</th>
        <th>Aksi</th>
    </tr>

    <?php $no=1; while($a=mysqli_fetch_assoc($data)){ ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $a['nama_obat'] ?></td>
        <td><?= $a['jenis'] ?></td>
        <td><?= $a['stok'] ?></td>
        <td>
            <button onclick="editStok('<?= $a['id'] ?>','<?= $a['stok'] ?>')">Edit Stok</button>
        </td>
    </tr>
    <?php } ?>
</table>

        </div>

    </div>
</div>

</body>
<div id="popup" style="
    display:none; 
    position:fixed; 
    top:0; left:0; 
    width:100%; 
    height:100%; 
    background:rgba(0,0,0,0.6); 
    justify-content:center; 
    align-items:center;">
    
    <div style="background:white; padding:20px; width:300px; border-radius:10px;">
        <h3>Edit Stok Obat</h3>
        <form method="post">
            <input type="hidden" name="id" id="edit_id">

            <label>Stok Baru</label>
            <input type="number" name="stok_baru" id="edit_stok" required>

            <button type="submit" name="update_stok">Update</button>
            <button type="button" onclick="closePopup()">Batal</button>
        </form>
    </div>

</div>

<script>
function editStok(id, stok){
    document.getElementById("popup").style.display = "flex";
    document.getElementById("edit_id").value = id;
    document.getElementById("edit_stok").value = stok;
}

function closePopup(){
    document.getElementById("popup").style.display = "none";
}
</script>

</html>
