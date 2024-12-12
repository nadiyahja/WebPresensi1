<?php 
include 'header2.php';
?>

<head>
    <link rel="stylesheet" href="styles.css"> 
    <!-- Link ke file print.js -->
    <script src="print.js"></script> 
</head>
    
<div class="content">
    <h2>Data Siswa</h2>
    <br>
    <form method="GET" action="data_siswa_admin.php">
        <label>Pencarian :</label>
        <input type="text" name="search" placeholder="Cari nama siswa..." value="<?php if(isset($_GET['search'])){echo $_GET['search'];} ?>">
        <input type="submit" value="Cari">
    </form>
    <br>
    <a href="tambah_siswa.php?action=tambah">+ TAMBAH SISWA</a>
    <br>
    <img id="printButton" src="assets/print.png" alt="Print Data Siswa" style="width: 50px; height: auto; cursor: pointer;">
    <br><br>
    <table border="1">
        <tr>
            <th>No</th>
            <th>NISN</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Alamat</th>
            <th>Opsi</th>
        </tr>
        <?php 
        include 'koneksi.php';
        if (isset($_GET['search'])){
            $pencarian = $_GET['search'];
            $query = "SELECT * FROM siswa WHERE Nama LIKE '%$pencarian%'";
        } else {
            $query = "SELECT * FROM siswa";
        }

        $no = 1;
        $data = mysqli_query($koneksi, $query);
        while ($d = mysqli_fetch_array($data)) {
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['NISN']; ?></td>
                <td><?php echo $d['Nama']; ?></td>
                <td><?php echo $d['Kelas']; ?></td>
                <td><?php echo $d['Jurusan']; ?></td>
                <td><?php echo $d['Alamat']; ?></td>
                <td>
                <a href="edit_siswa.php?action=edit&id=<?php echo $d['NISN']; ?>">EDIT</a>
                <a href="hapus_siswa.php?action=hapus&id=<?php echo $d['NISN']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">HAPUS</a>
                </td>
            </tr>
            <?php 
        }
        ?>
    </table>
</div>
<?php include 'footer.html'; ?>
