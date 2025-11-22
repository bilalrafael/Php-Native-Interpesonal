<?php
    include "../koneksi.php"; 
    $id = $_GET['id'];
    $data = mysqli_query($koneksi, "SELECT * FROM siswa WHERE id='$id'");
    $d = mysqli_fetch_array($data);
    mysqli_report(MYSQLI_REPORT_OFF);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Siswa</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="container mt-4">
    <h2 class="mb-3">Edit Data Siswa</h2>
    <a href="index.php" class="btn btn-secondary mb-3">Kembali</a>
    <div class="card shadow-sm">
        <div class="card-body">
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Nama Siswa</label>
                    <input type="text" name="nama" class="form-control" value="<?= $d['nama']; ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">NISN</label>
                    <input type="text" name="nisn" class="form-control" value="<?= $d['nisn']; ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <select name="jk" class="form-control">
                        <option value="1" <?= $d['jk']==1 ? 'selected' : ''; ?> >Laki-laki</option>
                        <option value="0" <?= $d['jk']==0 ? 'selected' : ''; ?> >Perempuan</option>
                    </select>
                </div>
                <button type="submit" name="update" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>

    <?php
        if (isset($_POST['update'])) {
            $nama = $_POST['nama'];
            $nisn = $_POST['nisn'];
            $jk   = $_POST['jk'];
            $query = "UPDATE siswa SET 
                        nama='$nama',
                        nisn='$nisn',
                        jk='$jk'
                    WHERE id='$id'";
            $hasil = mysqli_query($koneksi, $query);
            if (!$hasil) {
                // Cek duplicate NISN
                if (mysqli_errno($koneksi) == 1062) {
                    echo "
                    <script>
                        alert('Gagal! NISN sudah terdaftar.');
                        window.location='edit.php?id=$id';
                    </script>";
                } else {
                    echo "
                    <script>
                        alert('Terjadi kesalahan: " . mysqli_error($koneksi) . "');
                        window.location='edit.php?id=$id';
                    </script>";
                }
            } else {
                echo "
                <script>
                    alert('Data berhasil diupdate!');
                    window.location='index.php';
                </script>";
            }
        }
    ?>
</body>
</html>