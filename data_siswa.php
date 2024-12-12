<?php
include 'koneksi.php';
include 'header3.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <link rel="stylesheet" href="styles.css"> <!-- Pastikan file styles.css ada -->
    <title>Data Siswa</title>
</head>
<body>
    <div class="table-container">
        <!-- Frame kiri -->
        <div class="table-frame"></div>

        <!-- Tabel utama -->
        <div class="table-wrapper">
            <h2>Data Siswa</h2>
            <br>
            <table>
                <thead>
                    <tr>
                        <th>Avatar</th>
                        <th>Nama</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM siswa";
                    $data = mysqli_query($koneksi, $query);

                    while ($d = mysqli_fetch_array($data)) {
                        $avatar_url = 'https://ui-avatars.com/api/?name=' . urlencode($d['Nama']) . '&background=random';
                        ?>
                        <tr onclick="window.location='detail_siswa.php?nisn=<?php echo $d['NISN']; ?>'">
                            <td><img src="<?php echo $avatar_url; ?>" alt="Avatar" width="50" height="50"></td>
                            <td><?php echo $d['Nama']; ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Frame kanan -->
        <div class="table-frame"></div>
    </div>
</body>
</html>
<?php include 'footer.html'; ?>
