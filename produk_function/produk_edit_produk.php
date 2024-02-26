<?php
// Fungsi untuk mendapatkan data berdasarkan ID
function getDataById($id)
{
    // Gantilah ini dengan koneksi database Anda
    include '../koneksi.php';

    $id = mysqli_real_escape_string($koneksi, $id);

    $query = "SELECT * FROM produk WHERE ProdukID = $id";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        $data = mysqli_fetch_assoc($result);
        return $data;
    } else {
        return false;
    }
}

// Fungsi untuk mengupdate data
function updateData($id, $kode_produk ,$namaProduk, $harga, $stok)
{
    // Gantilah ini dengan koneksi database Anda
    include '../koneksi.php';

    $id = mysqli_real_escape_string($koneksi, $id);
    $kode_produk = mysqli_real_escape_string($koneksi, $kode_produk);
    $namaProduk = mysqli_real_escape_string($koneksi, $namaProduk);
    $harga = mysqli_real_escape_string($koneksi, $harga);
    $stok = mysqli_real_escape_string($koneksi, $stok);

    $query = "UPDATE produk SET kode_produk = '$kode_produk', NamaProduk = '$namaProduk', Harga = '$harga', Stok = '$stok' WHERE ProdukID = $id";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        return true;
    } else {
        return false;
    }
}

// Menggunakan data yang dikirim dari form edit
if (isset($_POST['editData'])) {
    $id = $_POST['ProdukID'];
    $kode_produk = $_POST['kode_produk'];
    $namaProduk = $_POST['NamaProduk'];
    $harga = $_POST['Harga'];
    $stok = $_POST['Stok'];

    // Memanggil fungsi updateData
    if (updateData($id, $kode_produk, $namaProduk, $harga, $stok)) {
        header('Location: ../admin/admin.php?url=produk');
    } else {
        echo "Gagal mengupdate data.";
    }
}
?>