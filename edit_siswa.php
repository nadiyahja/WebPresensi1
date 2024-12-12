<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($koneksi, "SELECT * FROM siswa WHERE NISN='$id'");
    $data = mysqli_fetch_array($result);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Ambil data dari form
        $nisn = $_POST['nisn'];
        $nama = $_POST['nama'];
        $kelas = $_POST['kelas'];
        $jurusan = $_POST['jurusan'];
        $alamat = $_POST['alamat'];

        // Query update
        $query = "UPDATE siswa SET NISN='$nisn', Nama='$nama', Kelas='$kelas', Jurusan='$jurusan', Alamat='$alamat' WHERE NISN='$id'";
        
        // Menjalankan query
        if (mysqli_query($koneksi, $query)) {
            // Jika berhasil update, tampilkan alert dan arahkan ke halaman data siswa
            echo "<script>alert('Data berhasil diperbarui!'); window.location.href='data_siswa_admin.php';</script>";
            exit();
        } else {
            // Jika gagal, tampilkan alert dengan pesan kesalahan
            echo "<script>alert('Gagal memperbarui data: " . mysqli_error($koneksi) . "');</script>";
        }
    } else {
        // Jika bukan POST, tampilkan form
        ?>
        <head><link rel="stylesheet" href="styles.css"></head>
        <h2>Edit Data Siswa</h2>
        <form method="post" action="">
            <label>NISN:</label>
            <input type="text" name="nisn" value="<?php echo $data['NISN']; ?>" readonly><br>

            <label>Nama:</label>
            <input type="text" name="nama" value="<?php echo $data['Nama']; ?>" required><br>

            <label>Kelas:</label>
            <select name="kelas" required>
                <option value="<?php echo $data['Kelas']; ?>" selected><?php echo $data['Kelas']; ?></option>
                <option value="XI">XI</option>
            </select><br>

            <label>Jurusan:</label>
            <select name="jurusan" required>
                <option value="<?php echo $data['Jurusan']; ?>" selected><?php echo $data['Jurusan']; ?></option>
                <option value="RPL B">RPL B</option>
            </select><br>

            <label>Alamat:</label>
            <input type="text" name="alamat" value="<?php echo $data['Alamat']; ?>" required><br>

            <input type="submit" value="Update">
        </form>
        <a href="data_siswa_admin.php" class="back-link">Kembali ke Daftar Siswa</a>
        <?php
    }
} else {
    echo "ID tidak ditemukan.";
}
?>
