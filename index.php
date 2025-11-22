<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
</head>
<body>
    <h2>Data Siswa</h2>
    <a href="create.php">Tambah Data</a>
    <br><br>
    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>NISN</th>
            <th>JK</th>
            <th>Aksi</th>
        </tr>
        <?php
        $data = mysqli_query($koneksi, "SELECT * FROM siswa");
        while($d = mysqli_fetch_array($data)){
        ?>
        <tr>
            <td><?= $d['id']; ?></td>
            <td><?= $d['nama']; ?></td>
            <td><?= $d['nisn']; ?></td>
            <td><?= $d['jk'] == 1 ? 'Laki-laki' : 'Perempuan'; ?></td>
            <td>
                <a href="edit.php?id=<?= $d['id']; ?>">Edit</a> |
                <a href="delete.php?id=<?= $d['id']; ?>" onclick="return confirm('Hapus data?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>