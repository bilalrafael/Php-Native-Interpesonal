<?php include "../koneksi.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Siswa</title>
    <!-- Boostrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Boostap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="container mt-3">
    <h2>Data Siswa</h2>
    <a href="create.php" class="btn btn-secondary">Tambah Data</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>NISN</th>
                <th>JK</th>
                <th>Aksi</th>
            </tr>
        </thead>
    <tbody>
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
                <a href="../delete.php?id=<?= $d['id']; ?>" onclick="return confirm('Hapus data?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
    </table>
</body>
</html>