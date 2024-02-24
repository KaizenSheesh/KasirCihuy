<?php
include '../koneksi.php';
session_start();

$Stok = $_POST['Stok'];
$cart = $_SESSION['cart'];

foreach ($cart as $key => $value) {
    $_SESSION['cart'][$key]['Stok'] = $Stok[$key];

    $idbarang = $_SESSION['cart'][$key];

    //cek jika di keranjang sudah ada barang yang masuk
    $key = array_search($idbarang, array_column($_SESSION['cart'], 'id'));
    if ($key !== false) {
        // return var_dump($_SESSION['cart']);
        //cek jika ada potongan dan cek jumlah barang lebih besar sama dengan minimum order potongan
        if ($disb['Stok'] && $_SESSION['cart'][$key]['Stok'] >= $disb['Stok']) {

            //cek kelipatan jumlah barang dengan batas minimum order
            $mod = $_SESSION['cart'][$key]['Stok'] % $disb['Stok'];
            if ($mod == 0) {
                //Jika benar jumlah barang kelipatan batas minimum order
                $d = $_SESSION['cart'][$key]['Stok'] / $disb['Stok'];
            } else {

                //Simpan jumlah potongan yang didapat
                $d = ($_SESSION['cart'][$key]['Stok'] - $mod) / $disb['Stok'];
            }

            //Simpan diskon dengan jumlah kelipatan dikali potongan barang
            $_SESSION['cart'][$key]['diskon'] = $d * $disb['potongan'];
        }
    }
}
header('location:../admin/transaksi.php');
