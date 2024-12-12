<?php
include 'header1.php';
include 'koneksi.php';

// Set zona waktu Jakarta
date_default_timezone_set('Asia/Jakarta');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nisn = $_POST['nisn'];
    $status = $_POST['status'];
    $waktu = $_POST['waktu'];
    $tanggal = $_POST['tanggal'];

    // Ubah status jika waktu lebih dari jam 09:00
    if ($waktu > "09:00") {
        $status = "Alpha";
    }

    // Menggunakan prepared statement untuk keamanan
    $query = $koneksi->prepare("INSERT INTO notes (NISN, status, waktu, tanggal) VALUES (?, ?, ?, ?)");
    $query->bind_param("ssss", $nisn, $status, $waktu, $tanggal);

    if ($query->execute()) {
        // Notifikasi sukses dengan alert
        echo "<script>alert('Data presensi berhasil ditambahkan!'); window.location.href='presensi_siswa_admin.php';</script>";
        exit();
    } else {
        // Notifikasi gagal dengan alert
        echo "<script>alert('Gagal menambahkan data: " . $query->error . "'); window.location.href='tambah_presensi.php';</script>";
    }
} else {
    ?>
    <head><link rel="stylesheet" href="styles.css"></head>
    <h2>Tambah Data Presensi</h2>
    <form method="post" action="">
        NISN: <input type="text" name="nisn" required><br>
        Status: 
        <select name="status" required>
            <option value="Hadir">Hadir</option>
            <option value="Sakit">Sakit</option>
            <option value="Izin">Izin</option>
            <option value="Alfa">Alfa</option>
        </select><br>
        <!-- Mengisi waktu dan tanggal secara otomatis -->
        Waktu: <input type="time" name="waktu" value="<?php echo date('H:i'); ?>" required><br>
        Tanggal: <input type="date" name="tanggal" value="<?php echo date('Y-m-d'); ?>" required><br>

        <input type="submit" value="Tambah">
    </form>
    <a href="presensi_siswa.php" class="back-link">Kembali ke Daftar Presensi</a>
    <?php
}

include 'footer.html';
?>
