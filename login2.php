<?php
session_start();

// Data username dan password (hardcoded)
$valid_username = 'siswa1';  // Ganti dengan username yang diinginkan
$valid_password = 'siswa123';  // Ganti dengan password yang diinginkan

// Cek apakah sudah login
if (isset($_SESSION['username'])) {
    header('Location: data_siswa.php'); // Jika sudah login, arahkan data siswa
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Cek apakah username dan password yang dimasukkan sesuai
    if ($username === $valid_username && $password === $valid_password) {
        // Login berhasil
        $_SESSION['username'] = $username;
        header('Location: data_siswa.php'); // Redirect ke data siswa
        exit;
    } else {
        // Login gagal
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Siswa</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Login Siswa</h2>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST" action="">
        Username: <input type="text" name="username" required><br>
        Password: <input type="password" name="password" required><br>
        <input type="submit" value="Login">
    </form>
    <a href="home.html" class="back-link">Kembali ke halaman utama</a>
</body>
</html>
