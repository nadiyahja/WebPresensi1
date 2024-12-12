<?php
include 'koneksi.php';

if (isset($_GET['nisn'])) {
    $nisn = $_GET['nisn'];
    $query = "SELECT * FROM siswa WHERE NISN = '$nisn'";
    $result = mysqli_query($koneksi, $query);

    if ($d = mysqli_fetch_array($result)) {
        ?>
        <!DOCTYPE html>
        <html lang="id">
            <center>
        <head>
            <link rel="stylesheet" href="styles.css">
            <title>Detail Siswa</title>
            <br><br>
        </head>
        <body>
            <div class="container">
                <h2>Detail Siswa</h2>
                <br>
                <p><strong>NISN:</strong> <?php echo $d['NISN']; ?></p>
                <br>
                <p><strong>Nama:</strong> <?php echo $d['Nama']; ?></p>
                <br>
                <p><strong>Kelas:</strong> <?php echo $d['Kelas']; ?></p>
                <br>
                <p><strong>Jurusan:</strong> <?php echo $d['Jurusan']; ?></p>
                <br>
                <p><strong>Alamat:</strong> <?php echo $d['Alamat']; ?></p>
                <br>
                <a href="data_siswa.php" class="button">Kembali ke Data Siswa</a>
            </div>
        </body>
    </center>
        </html>
        <?php
    } else {
        echo "Data siswa tidak ditemukan.";
    }
} else {
    echo "NISN tidak diberikan.";
}
?>
