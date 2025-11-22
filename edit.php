<?php 
    include "koneksi.php"; 
    $id = $_GET['id'];
    $data = mysqli_query($koneksi, "SELECT * FROM siswa WHERE id='$id'");
    $d = mysqli_fetch_array($data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
</head>
<body>
    <h2>Edit Siswa</h2>
    <a href="index.php">Kembali</a>
    <br><br>
    <form method="POST">
        Nama:<br>
        <input type="text" name="nama" value="<?= $d['nama']; ?>" required><br><br>

        NISN:<br>
        <input type="text" name="nisn" value="<?= $d['nisn']; ?>" required><br><br>

        Jenis Kelamin:<br>
        <select name="jk">
            <option value="1" <?= $d['jk']==1 ? 'selected' : ''; ?>>Laki-laki</option>
            <option value="0" <?= $d['jk']==0 ? 'selected' : ''; ?>>Perempuan</option>
        </select><br><br>

        <input type="submit" name="update" value="Update">
    </form>
    <?php
        if (isset($_POST['update'])) {
            mysqli_query($koneksi, "UPDATE siswa SET 
                nama='$_POST[nama]',
                nisn='$_POST[nisn]',
                jk='$_POST[jk]'
                WHERE id='$id'
            ");
            echo "<script>alert('Data berhasil diupdate'); window.location='index.php';</script>";
        }
    ?>
</body>
</html>


<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
</head>
<body>

</body>
</html>
