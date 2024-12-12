<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($koneksi, "SELECT * FROM guru WHERE NIP='$id'");
    $data = mysqli_fetch_array($result);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nama = $_POST['nama'];
        $jabatan = $_POST['jabatan'];
        $no_hp = $_POST['no_hp'];

        $query = "UPDATE guru SET Nama='$nama', Jabatan='$jabatan', No_HP='$no_hp' WHERE NIP='$id'";
        if (mysqli_query($koneksi, $query)) {
            // Menampilkan alert dan mengarahkan kembali ke halaman data_guru.php
            echo "<script>alert('Data berhasil diperbarui!'); window.location.href='data_guru_admin.php';</script>";
            exit();
        } else {
            // Menampilkan alert jika terjadi error
            echo "<script>alert('Gagal memperbarui data: " . mysqli_error($koneksi) . "');</script>";
        }
    } else {
        // Form edit dengan data lama
        ?>
        <head><link rel="stylesheet" href="styles.css"></head>
        <h2>Edit Data Guru</h2>
        <form method="post" action="">
            NIP: <input type="text" name="NIP" value="<?php echo htmlspecialchars($data['NIP']); ?>" readonly><br>
            Nama: <input type="text" name="nama" value="<?php echo htmlspecialchars($data['Nama']); ?>" required><br>
            Jabatan: <input type="text" name="jabatan" value="<?php echo htmlspecialchars($data['Jabatan']); ?>" required><br>
            No HP: <input type="text" name="no_hp" value="<?php echo htmlspecialchars($data['No_HP']); ?>" required><br>
            <input type="submit" value="Update">
        </form>
        <a href="data_guru_admin.php" class="back-link">Kembali ke Daftar Guru</a>
        <?php
    }
}
?>
