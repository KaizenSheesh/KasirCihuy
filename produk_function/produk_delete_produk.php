<?php
include '../koneksi.php'; // Include your database connection file

function deleteProduct($produkID) {
    global $koneksi;

    // Sanitize input to prevent SQL injection
    $produkID = mysqli_real_escape_string($koneksi, $produkID);

    // Perform delete query
    $sql = "DELETE FROM produk WHERE ProdukID = '$produkID'";

    if (mysqli_query($koneksi, $sql)) {
        return true; // Deletion successful
    } else {
        return false; // Deletion failed
    }
}

// Example usage:
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['ProdukID'])) {
    $produkIDToDelete = $_GET['ProdukID'];

    if (deleteProduct($produkIDToDelete)) {
        header('Location: ../admin/admin.php?url=produk');
    } else {
        echo "Error deleting product.";
    }
}

// Close the database connection
mysqli_close($koneksi);
?>
