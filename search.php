<?php
include 'koneksi.php';

// Ambil kata kunci pencarian dari input form
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Query untuk menampilkan data siswa, jika ada pencarian filter data berdasarkan nama
$query = "SELECT * FROM siswa WHERE Nama LIKE '%$search%' OR NISN LIKE '%$search%'";

$result = mysqli_query($koneksi, $query);

echo "<table>
        <tr>
            <th>NISN</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Alamat</th>
        </tr>";

if (mysqli_num_rows($result) > 0) {
    // Menampilkan hasil pencarian
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>
                <td>{$row['NISN']}</td>
                <td>{$row['Nama']}</td>
                <td>{$row['Kelas']}</td>
                <td>{$row['Jurusan']}</td>
                <td>{$row['Alamat']}</td>
            </tr>";
    }
} else {
    // Jika tidak ada data yang ditemukan
    echo "<tr><td colspan='5'>Tidak ada hasil untuk pencarian ini.</td></tr>";
}

echo "</table>";
?>
