document.addEventListener("DOMContentLoaded", function () {
    const printButton = document.getElementById("printButton");

    // Event listener untuk klik pada gambar
    printButton.addEventListener("click", function () {
        window.print(); // Cetak halaman
    });
});
