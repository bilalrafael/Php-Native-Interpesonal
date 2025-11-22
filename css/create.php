<?php
    include "../koneksi.php";
    mysqli_report(MYSQLI_REPORT_OFF);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Siswa</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="container mt-4">
    <h2 class="mb-3">Tambah Data Siswa</h2>
    <a href="index.php" class="btn btn-secondary mb-3">Kembali</a>
    <div class="card shadow-sm">
        <div class="card-body">
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Nama Siswa</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">NISN</label>
                    <input type="text" name="nisn" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <select name="jk" class="form-control" required>
                        <option value="1">Laki-laki</option>
                        <option value="0">Perempuan</option>
                    </select>
                </div>
                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
    <?php
        if (isset($_POST['simpan'])) {
            $nama = $_POST['nama'];
            $nisn = $_POST['nisn'];
            $jk   = $_POST['jk'];
            $query = "INSERT INTO siswa VALUES (NULL, '$nama', '$nisn', '$jk')";
            $hasil = mysqli_query($koneksi, $query);
            if (!$hasil) {
                // Jika error DUPLICATE ENTRY (NISN sudah ada)
                if (mysqli_errno($koneksi) == 1062) {
                    echo "
                    <script>
                        alert('Gagal! NISN sudah terdaftar.');
                        window.location='create.php';
                    </script>";
                } else {
                    // Error lain
                    echo "
                    <script>
                        alert('Terjadi kesalahan: " . mysqli_error($koneksi) . "');
                        window.location='create.php';
                    </script>";
                }
            } else {
                // Jika sukses
                echo "
                <script>
                    alert('Data berhasil disimpan!');
                    window.location='index.php';
                </script>";
            }
        }
    ?>
</body>
</html>