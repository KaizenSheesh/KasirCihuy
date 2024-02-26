<?php
include '../koneksi.php'; // Include your database connection file

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the form
    $NamaPelanggan = $_POST['NamaPelanggan'];
    $Alamat = $_POST['Alamat'];
    $NomorTelepon = $_POST['NomorTelepon'];

    // Prepare an insert statement
    $stmt = mysqli_prepare($koneksi, "INSERT INTO pelanggan (NamaPelanggan, Alamat, NomorTelepon) VALUES (?, ?, ?)");

    // Bind the parameters
    mysqli_stmt_bind_param($stmt, "sss", $NamaPelanggan, $Alamat, $NomorTelepon);


    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        header('Location: ../admin/admin.php?url=pelanggan');
    } else {
        echo "Error: " . mysqli_stmt_error($stmt);
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}

// Close the database connection
mysqli_close($koneksi);
