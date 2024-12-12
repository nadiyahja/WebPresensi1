<?php
include('header2.php');  // Menyertakan file header.php
include('koneksi.php');  // Menyertakan file koneksi database

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Mulai transaksi untuk memastikan penghapusan data dilakukan dengan aman
    mysqli_begin_transaction($koneksi);

    try {
        // Hapus data yang terkait di tabel rating terlebih dahulu
        $query_rating = "DELETE FROM rating WHERE guru_nip='$id'";
        if (!mysqli_query($koneksi, $query_rating)) {
            throw new Exception("Gagal menghapus data rating: " . mysqli_error($koneksi));
        }

        // Setelah data rating berhasil dihapus, lanjutkan menghapus data guru
        $query_guru = "DELETE FROM guru WHERE NIP='$id'";
        if (!mysqli_query($koneksi, $query_guru)) {
            throw new Exception("Gagal menghapus data guru: " . mysqli_error($koneksi));
        }

        // Jika tidak ada error, commit transaksi
        mysqli_commit($koneksi);
        
        // Menampilkan alert jika penghapusan berhasil
        echo "<script>alert('Data berhasil dihapus!'); window.location.href='data_guru_admin.php';</script>";
    } catch (Exception $e) {
        // Jika ada error, rollback transaksi
        mysqli_roll_back($koneksi);

        // Menampilkan error
        echo "<script>alert('".$e->getMessage()."'); window.location.href='data_guru_admin.php';</script>";
    }
}
?>
