<?php
include 'koneksi.php';

if (isset($_GET['action'])) {
    $action = $_GET['action'];

    // Fungsi tambah data
    if ($action == 'tambah') {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nisn = mysqli_real_escape_string($koneksi, $_POST['nisn']);
            $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
            $kelas = mysqli_real_escape_string($koneksi, $_POST['kelas']);
            $jurusan = mysqli_real_escape_string($koneksi, $_POST['jurusan']);
            $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);

            // Query untuk menambahkan data
            $query = "INSERT INTO siswa (NISN, Nama, Kelas, Jurusan, Alamat) VALUES ('$nisn', '$nama', '$kelas', '$jurusan', '$alamat')";
            if (mysqli_query($koneksi, $query)) {
                // Tambah data berhasil dengan notifikasi
                echo "<script>alert('Data berhasil ditambahkan!'); window.location.href='data_siswa_admin.php';</script>";
                exit();
            } else {
                // Jika ada error dalam query, tampilkan notifikasi
                echo "<script>alert('Gagal menambahkan data: " . mysqli_error($koneksi) . "'); window.location.href='tambah_siswa.php';</script>";
            }
        } else {
            // Tampilkan form tambah dengan select untuk kelas dan jurusan
            ?>
            <!DOCTYPE html>
            <html lang="id">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="styles.css">
                <title>Tambah Data Siswa</title>
            </head>
            <body>
                <h2>Tambah Data Siswa</h2>
                <form method="post" action="">
                    <label for="nisn">NISN:</label>
                    <input type="text" id="nisn" name="nisn" required><br>

                    <label for="nama">Nama:</label>
                    <input type="text" id="nama" name="nama" required><br>

                    <label for="kelas">Kelas:</label>
                    <select id="kelas" name="kelas" required>
                        <option value="">Pilih Kelas</option>
                        <option value="XI">XI</option>
                    </select><br>

                    <label for="jurusan">Jurusan:</label>
                    <select id="jurusan" name="jurusan" required>
                        <option value="">Pilih Jurusan</option>
                        <option value="RPL B">RPL B</option>
                    </select><br>

                    <label for="alamat">Alamat:</label>
                    <input type="text" id="alamat" name="alamat" required><br>

                    <input type="submit" value="Tambah">
                </form>
                <a href="data_siswa_admin.php" class="back-link">Kembali ke Daftar Siswa</a>
            </body>
            </html>
            <?php
        }
    }
}
?>
