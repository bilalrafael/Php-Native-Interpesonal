<?php
    include "koneksi.php";
    mysqli_report(MYSQLI_REPORT_OFF); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
</head>
<body>
    <h2>Tambah Data Siswa</h2>
    <a href="index.php">Kembali</a>
    <br>
    <form method="POST">
        Nama:
        <input type="text" name="nama" required><br><br>
        NISN:
        <input type="text" name="nisn" required><br><br>
        Jenis Kelamin:
        <select name="jk" required>
            <option value="1">Laki-laki</option>
            <option value="0">Perempuan</option>
        </select><br>
        <input type="submit" name="simpan" value="Simpan">
    </form>
    <?php
        if (isset($_POST['simpan'])) {
            $nama = $_POST['nama'];
            $nisn = $_POST['nisn'];
            $jk   = $_POST['jk'];
            $query = "INSERT INTO siswa VALUES (NULL, '$nama', '$nisn', '$jk')";
            $hasil = mysqli_query($koneksi, $query);
            if (!$hasil) {
                // Tangkap error duplicate entry
                if (mysqli_errno($koneksi) == 1062) {
                    echo "
                    <script>
                        alert('Gagal! NISN sudah terdaftar.');
                        window.location='tambah.php';
                    </script>";
                } else {
                    // Error lain
                    echo "
                    <script>
                        alert('Terjadi kesalahan: " . mysqli_error($koneksi) . "');
                        window.location='tambah.php';
                    </script>";
                }
            } else {
                // Jika berhasil insert
                echo "
                <script>
                    alert('Data berhasil disimpan');
                    window.location='index.php';
                </script>";
            }
        }
    ?>
</body>
</html>