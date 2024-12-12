<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Presensi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(to bottom right, #f0f8ff, #add8e6);
        }
        .container {
            text-align: center;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }
        p {
            color: #555;
            margin-bottom: 20px;
        }
        .buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
        }
        .button {
            text-decoration: none;
            padding: 15px 30px;
            border-radius: 10px;
            color: white;
            font-weight: bold;
            transition: background 0.3s;
        }
        .admin {
            background: #007acc;
        }
        .admin:hover {
            background: #005fa3;
        }
        .user {
            background: #4caf50;
        }
        .user:hover {
            background: #3e8e41;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sistem Presensi Online</h1>
        <p>Silakan pilih login sesuai peran Anda:</p>
        <div class="buttons">
            <a href="login.php" class="button admin">Login Admin</a>
            <a href="login2.php" class="button user">Login Siswa</a>
        </div>
    </div>
</body>
</html>
