<?php 
session_start();
include 'header3.php'; 
include 'koneksi.php'; 
?>

<head><link rel="stylesheet" href="styles.css"></head>
<div class="content">
    <h2>Tabel Guru</h2>
    <br>
    <form method="GET" action="data_guru.php">
        <label>Pencarian :</label>
        <input type="text" name="search" placeholder="Cari nama guru..." value="<?php if(isset($_GET['search'])){echo $_GET['search'];} ?>">
        <input type="submit" value="Cari">
    </form>
    <br>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>No HP</th>
            <th>Berikan Rating</th>
        </tr>
        <?php 
        $no = 1;
        if (isset($_GET['search'])) {
            $pencarian = $_GET['search'];
            $query = "SELECT * FROM guru WHERE Nama LIKE '%$pencarian%'";
        } else {
            $query = "SELECT * FROM guru";
        }
        $data = mysqli_query($koneksi, $query);
        while ($d = mysqli_fetch_array($data)) {
            $guru_nip = $d['NIP'];
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['Nama']; ?></td>
                <td><?php echo $d['Jabatan']; ?></td>
                <td><?php echo $d['No_HP']; ?></td>
                <td>
                    <form method="POST" action="rate_guru.php">
                        <input type="hidden" name="guru_nip" value="<?php echo $guru_nip; ?>">
                        <select name="rating">
                            <option value="1">1 - Buruk</option>
                            <option value="2">2 - Cukup</option>
                            <option value="3">3 - Baik</option>
                            <option value="4">4 - Sangat Baik</option>
                            <option value="5">5 - Luar Biasa</option>
                        </select>
                        <button type="submit">Rate</button>
                    </form>
                </td>
            </tr>
            <?php 
        }
        ?>
    </table>
</div>
<?php include 'footer.html'; ?>
