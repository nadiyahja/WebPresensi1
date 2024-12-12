<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM siswa WHERE NISN='$id'";
    
    if (mysqli_query($koneksi, $query)) {
        // Menampilkan alert jika penghapusan berhasil dan mengarahkan ke data_guru.php
        echo "<script>alert('Data berhasil dihapus!'); window.location.href='data_siswa_admin.php';</script>";
    } else {
        // Menampilkan alert jika penghapusan gagal
        echo "<script>alert('Gagal menghapus data: " . mysqli_error($koneksi) . "');</script>";
    }
}
?>
