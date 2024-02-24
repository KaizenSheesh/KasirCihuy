<?php
include '../koneksi.php'; // Include your database connection file

function deleteProduct($PelangganID) {
    global $koneksi;

    // Sanitize input to prevent SQL injection
    $PelangganID = mysqli_real_escape_string($koneksi, $PelangganID);

    // Perform delete query
    $sql = "DELETE FROM pelanggan WHERE PelangganID = '$PelangganID'";

    if (mysqli_query($koneksi, $sql)) {
        return true; // Deletion successful
    } else {
        return false; // Deletion failed
    }
}

// Example usage:
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['PelangganID'])) {
    $PelangganIDToDelete = $_GET['PelangganID'];

    if (deleteProduct($PelangganIDToDelete)) {
        header('Location: ../admin/admin.php?url=pelanggan');
    } else {
        echo "Error deleting product.";
    }
}

// Close the database connection
mysqli_close($koneksi);
?>
