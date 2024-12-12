<?php
session_start();
if (!isset($_SESSION['username'])) { // Ganti 'user' dengan 'username'
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <header>
        <nav>
            <ul>
                <!-- Navbar khusus untuk admin -->
                <a href="dashboard.php"><i class="fas fa-home"></i> Dashboard</a>
                <a href="data_siswa_admin.php"><i class="fas fa-users"></i> Data Siswa</a>
                <a href="presensi_siswa_admin.php"><i class="fas fa-calendar-check"></i> Presensi</a>
                <a href="data_guru_admin.php"><i class="fas fa-chalkboard-teacher"></i> Data Guru</a>
                <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </ul>
        </nav>
    </header>
