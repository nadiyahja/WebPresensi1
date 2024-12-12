<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <link rel="stylesheet" href="styles.css"> 
</head>
<body>
<div class="logout-wrapper">
    <div class="logout-container">
        <p class="logout-message">Anda yakin ingin logout?</p>
        <div class="logout-buttons">
            <a href="logout_action.php">Logout</a> <!-- Menghapus sesi -->
            <a href="data_siswa.php">Kembali</a> <!-- Tidak menghapus sesi -->
        </div>
    </div>
</div>
</body>
</html>
