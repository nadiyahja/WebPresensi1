<?php
include 'header2.php';
include 'koneksi.php';

// Set zona waktu Jakarta
date_default_timezone_set('Asia/Jakarta');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nisn = $_POST['nisn'];
    $status = $_POST['status'];
    $waktu = date('H:i');
    $tanggal = date('Y-m-d');

    // Mengubah status jika waktu lebih dari 09:00
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
        echo "<script>alert('Gagal menambahkan data: " . $query->error . "'); window.location.href='tambah_presensi_admin.php';</script>";
    }
} else {
    ?>
    <head><link rel="stylesheet" href="styles.css"></head>
    <h2>Tambah Data Presensi</h2>
    <form method="post" action="">
        <label for="nisn">NISN:</label>
        <select name="nisn" required>
            <option value="">Pilih NISN</option>
            <?php
            // Ambil data NISN dari tabel siswa (pastikan tabelnya sesuai dengan database Anda)
            $result = mysqli_query($koneksi, "SELECT NISN, Nama FROM siswa");
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['NISN'] . "'>" . $row['NISN'] . " - " . $row['Nama'] . "</option>";
            }
            ?>
        </select><br>

        <label for="status">Status:</label>
        <select name="status" required>
            <option value="Hadir">Hadir</option>
            <option value="Sakit">Sakit</option>
            <option value="Izin">Izin</option>
            <option value="Alfa">Alfa</option>
        </select><br>

        <!-- Waktu dan tanggal diisi otomatis -->
        <label for="waktu">Waktu:</label>
        <input type="text" name="waktu_display" value="<?php echo date('H:i'); ?>" readonly><br>

        <label for="tanggal">Tanggal:</label>
        <input type="text" name="tanggal_display" value="<?php echo date('Y-m-d'); ?>" readonly><br>

        <input type="submit" value="Tambah">
    </form>
    <a href="presensi_siswa_admin.php" class="back-link">Kembali ke Daftar Presensi</a>
    <?php
}

include 'footer.html';
?>
