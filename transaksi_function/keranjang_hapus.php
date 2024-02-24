<?php 
include '../koneksi.php';
session_start();

$id = $_GET['id'];

// Mencari produk yang sesuai dengan ID yang diberikan
$cart = $_SESSION['cart'];

$filtered_cart = array_filter($cart, function ($item, $key) use ($id) {
    return $key == $id;
}, ARRAY_FILTER_USE_BOTH);

// Jika ada produk yang cocok, hapus dari session
if (!empty($filtered_cart)) {
    // Hapus produk dari session
    unset($_SESSION['cart'][key($filtered_cart)]);
    // Mengembalikan urutan indeks
    $_SESSION['cart'] = array_values($_SESSION['cart']);
}

header('location:../admin/transaksi.php');
?>
