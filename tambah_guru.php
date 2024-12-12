<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nip = mysqli_real_escape_string($koneksi, $_POST['nip']);
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $jabatan = mysqli_real_escape_string($koneksi, $_POST['jabatan']);
    $no_hp = mysqli_real_escape_string($koneksi, $_POST['no_hp']);

    $query = "INSERT INTO guru (NIP, Nama, Jabatan, No_HP) VALUES ('$nip', '$nama', '$jabatan', '$no_hp')";
    if (mysqli_query($koneksi, $query)) {
        // Menampilkan alert jika berhasil
        echo "<script>alert('Data berhasil ditambahkan!'); window.location.href='data_guru_admin.php';</script>";
    } else {
        // Menampilkan alert jika gagal
        echo "<script>alert('Gagal menambahkan data: " . mysqli_error($koneksi) . "'); window.location.href='tambah_guru_admin.php';</script>";
    }
} else {
    // Tampilkan form tambah
    ?>
    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
        <title>Tambah Data Guru</title>
    </head>
    <body>
        <h2>Tambah Data Guru</h2>
        <form method="post" action="">
            <label for="nip">NIP:</label>
            <input type="text" id="nip" name="nip" required><br>

            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required><br>

            <label for="jabatan">Jabatan:</label>
            <input type="text" id="jabatan" name="jabatan" required><br>

            <label for="no_hp">No HP:</label>
            <input type="text" id="no_hp" name="no_hp" required><br>

            <input type="submit" value="Tambah">
        </form>
        <a href="data_guru_admin.php" class="back-link">Kembali ke Daftar Guru</a>
    </body>
    </html>
    <?php
}
?>
