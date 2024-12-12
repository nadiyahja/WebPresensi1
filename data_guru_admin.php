<?php 
include 'header2.php'; 
include 'koneksi.php'; 
?>

<head>
    <link rel="stylesheet" href="styles.css"> 
    <script src="print.js"></script> 
</head>

<div class="content">
    <h2>Tabel Guru</h2>
    <br>
    <form method="GET" action="data_guru_admin.php">
        <label>Pencarian :</label>
        <input type="text" name="search" placeholder="Cari nama guru..." value="<?php if(isset($_GET['search'])){echo $_GET['search'];} ?>">
        <input type="submit" value="Cari">
    </form>
    <br>
    <a href="tambah_guru.php?action=tambah">+ TAMBAH GURU</a>
    <br>
    <img id="printButton" src="assets/print.png" alt="Print Data Guru" style="width: 50px; height: auto; cursor: pointer;">
    <br><br>
    <table border="1">
        <tr>
            <th>No</th>
            <th>NIP</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>No HP</th>
            <th>Rata-rata Rating</th>
            <th>Opsi</th>
        </tr>
        <?php 
        if (isset($_GET['search'])) {
            $pencarian = $_GET['search'];
            $query = "SELECT * FROM guru WHERE Nama LIKE '%$pencarian%'";
        } else {
            $query = "SELECT * FROM guru";
        }

        $no = 1;
        $data = mysqli_query($koneksi, $query);
        while ($d = mysqli_fetch_array($data)) {
            $guru_nip = $d['NIP'];
            // Menghitung rata-rata rating
            $rating_query = "SELECT AVG(rating) AS avg_rating FROM rating WHERE guru_nip = '$guru_nip'";
            $rating_result = mysqli_query($koneksi, $rating_query);
            $avg_rating = mysqli_fetch_array($rating_result)['avg_rating'];
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['NIP']; ?></td>
                <td><?php echo $d['Nama']; ?></td>
                <td><?php echo $d['Jabatan']; ?></td>
                <td><?php echo $d['No_HP']; ?></td>
                <td><?php echo (!is_null($avg_rating) ? number_format($avg_rating, 1) . ' / 5' : 'Belum ada rating'); ?></td>
                <td>
                    <a href="edit_guru.php?action=edit&id=<?php echo $guru_nip; ?>">EDIT</a>
                    <a href="hapus_guru.php?action=hapus&id=<?php echo $guru_nip; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">HAPUS</a>
                </td>
            </tr>
            <?php 
        }
        ?>
    </table>
</div>
<?php include 'footer.html'; ?>
