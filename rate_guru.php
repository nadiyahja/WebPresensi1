<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $guru_nip = $_POST['guru_nip'];
    $rating = $_POST['rating'];

    // Validasi input
    if ($rating < 1 || $rating > 5) {
        die("Rating tidak valid!");
    }

    // Simpan ke database
    $query = "INSERT INTO rating (guru_nip, rating) VALUES ('$guru_nip', '$rating')";
    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Terima kasih atas rating Anda!'); window.location='data_guru.php';</script>";
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>
