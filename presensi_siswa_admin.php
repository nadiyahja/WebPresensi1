<?php include 'header2.php'; ?>

<head>
    <link rel="stylesheet" href="styles.css"> 
    <!-- Link ke file print.js -->
    <script src="print.js"></script> 
</head>

<div class="content">
    <h2>Presensi Siswa</h2>
    <br>
    <form method="GET" action="presensi_siswa_admin.php">
        <label>Pencarian :</label>
        <input type="text" name="search" placeholder="Cari nama siswa..." value="<?php if(isset($_GET['search'])){echo $_GET['search'];} ?>">
        <input type="submit" value="Cari">
    </form>
    <br>
    <a href="tambah_presensi_admin.php?action=tambah">+ TAMBAH DATA</a>
    <br>
    <!-- Tombol Print -->
    <img id="printButton" src="assets/print.png" alt="Print Presensi Siswa" style="width: 50px; height: auto; cursor: pointer;">
    <br><br><br>
    <table>
        <tr>
            <th>No</th>
            <th>NISN</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Status</th>
            <th>Waktu</th>
            <th>Tanggal</th>
            <th class="no-print">Opsi</th>
        </tr>
        <?php 
        include 'koneksi.php';
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $pencarian = $_GET['search'];
            $query = "SELECT * FROM view_presensi WHERE Nama LIKE '%$pencarian%'";
        } else {
            $query = "SELECT * FROM view_presensi";
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
                <td><?php echo $d['status']; ?></td>
                <td><?php echo $d['waktu']; ?></td>
                <td><?php echo $d['tanggal']; ?></td>
                <td class="no-print">
                <a href="edit_presensi.php?action=edit&id=<?php echo $d['id']; ?>">EDIT</a>
                </td>
            </tr>
            <?php 
        }
        ?>
    </table>
</div>

<?php include 'footer.html'; ?>
