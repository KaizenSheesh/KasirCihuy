<?php
include '../koneksi.php'; // Include your database connection file

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the form
    $namaProduk = $_POST['NamaProduk'];
    $harga = $_POST['Harga'];
    $stok = $_POST['Stok'];
    $kode_produk = $_POST['kode_produk'];

    // Prepare an insert statement
    $stmt = mysqli_prepare($koneksi, "INSERT INTO produk (NamaProduk, harga, stok, kode_produk) VALUES (?, ?, ?, ?)");

    // Bind the parameters
    mysqli_stmt_bind_param($stmt, "siii", $namaProduk, $harga, $stok, $kode_produk);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        header('Location: ../admin/admin.php?url=produk');
    } else {
        echo "Error: " . mysqli_stmt_error($stmt);
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}

// Close the database connection
mysqli_close($koneksi);
?>
