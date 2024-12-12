<?php
session_start();

// untuk Cek apakah sudah login
if (isset($_SESSION['username'])) {
    header('Location: dashboard.php'); // Jika sudah login, arahkan ke dashboard
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Cek kredensial (misalnya dengan data hardcoded atau dari database)
    if ($username == 'admin' && $password == 'password123') { // Ganti dengan verifikasi sesungguhnya
        $_SESSION['username'] = $username;
        header('Location: dashboard.php'); // Redirect ke dashboard setelah login
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Login Admin</h2>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST" action="">
        Username: <input type="text" name="username" required><br>
        Password: <input type="password" name="password" required><br>
        <input type="submit" value="Login">
    </form>
    <a href="home.html" class="back-link">Kembali ke halaman</a>
</body>
</html>
