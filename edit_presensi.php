<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($koneksi, "SELECT * FROM view_presensi WHERE id='$id'");
    $data = mysqli_fetch_array($result);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $status = $_POST['status'];
        $waktu = $_POST['waktu'];
        $tanggal = $_POST['tanggal'];

        // Ubah kriteria WHERE ke id agar update sesuai dengan id yang dimaksud
        $query = "UPDATE notes SET status='$status', waktu='$waktu', tanggal='$tanggal' WHERE id='$id'";
        if (mysqli_query($koneksi, $query)) {
            // Tampilkan alert sukses dan arahkan ke halaman presensi_siswa_admin.php
            echo "<script>alert('Data berhasil diperbarui!'); window.location.href='presensi_siswa_admin.php';</script>";
            exit();
        } else {
            // Tampilkan alert jika terjadi error
            echo "<script>alert('Gagal memperbarui data: " . mysqli_error($koneksi) . "');</script>";
        }
    } else {
        // Form edit dengan data lama
        ?>
        <head><link rel="stylesheet" href="styles.css"></head>
        <h2>Edit Data Presensi</h2>
        <form method="post" action="">
            Status:
            <select name="status" required>
                <option value="Hadir" <?php echo ($data['status'] == 'Hadir' ? 'selected' : ''); ?>>Hadir</option>
                <option value="Sakit" <?php echo ($data['status'] == 'Sakit' ? 'selected' : ''); ?>>Sakit</option>
                <option value="Izin" <?php echo ($data['status'] == 'Izin' ? 'selected' : ''); ?>>Izin</option>
                <option value="Alfa" <?php echo ($data['status'] == 'Alfa' ? 'selected' : ''); ?>>Alfa</option>
            </select><br>
            Waktu: <input type="time" name="waktu" value="<?php echo htmlspecialchars($data['waktu']); ?>" required><br>
            Tanggal: <input type="date" name="tanggal" value="<?php echo htmlspecialchars($data['tanggal']); ?>" required><br>
            <input type="submit" value="Update">
        </form>
        <a href="presensi_siswa_admin.php" class="back-link">Kembali ke Daftar Presensi</a>
        <?php
    }
}
?>
