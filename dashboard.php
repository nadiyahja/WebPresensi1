<?php
include('header2.php');  // Menyertakan file header.php
include('koneksi.php'); // Menyertakan file koneksi database

// Query untuk menghitung jumlah siswa berdasarkan NISN
$data_siswa = mysqli_query($koneksi, "SELECT COUNT(NISN) AS total_siswa FROM siswa");
$siswa = mysqli_fetch_assoc($data_siswa);
$total_siswa = $siswa['total_siswa'];

// Query untuk menghitung jumlah guru berdasarkan NIP
$data_guru = mysqli_query($koneksi, "SELECT COUNT(NIP) AS total_guru FROM guru");
$guru = mysqli_fetch_assoc($data_guru);
$total_guru = $guru['total_guru'];
?>

<div class="dashboard-container">
    <h1>🎉 Selamat Datang Admin 🎉</h1>
    <p>Halo, <?php echo htmlspecialchars($_SESSION['username']); ?>! Semoga harimu menyenangkan!</p>
</div>

<div class="stats-container">
    <div class="stat-box">
        <h2><?php echo $total_siswa; ?></h2>
        <br>
        <p>Siswa</p>
    </div>
    <div class="stat-box">
        <h2><?php echo $total_guru; ?></h2>
        <br>
        <p>Guru</p>
    </div>
</div>

</body>
</html>
