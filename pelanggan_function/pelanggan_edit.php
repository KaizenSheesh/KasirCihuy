<?php
// Fungsi untuk mendapatkan data berdasarkan ID
function getDataById($id)
{
    // Gantilah ini dengan koneksi database Anda
    include '../koneksi.php';

    $id = mysqli_real_escape_string($koneksi, $id);

    $query = "SELECT * FROM pelanggan WHERE PelangganID = $id";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        $data = mysqli_fetch_assoc($result);
        return $data;
    } else {
        return false;
    }
}

// Fungsi untuk mengupdate data
function updateData($id, $namaPelanggan, $alamat, $nomorTelepon)
{
    // Gantilah ini dengan koneksi database Anda
    include '../koneksi.php';

    $id = mysqli_real_escape_string($koneksi, $id);
    $namaPelanggan = mysqli_real_escape_string($koneksi, $namaPelanggan);
    $alamat = mysqli_real_escape_string($koneksi, $alamat);
    $nomorTelepon = mysqli_real_escape_string($koneksi, $nomorTelepon);

    $query = "UPDATE pelanggan SET NamaPelanggan = '$namaPelanggan', Alamat = '$alamat', NomorTelepon = '$nomorTelepon' WHERE PelangganID = $id";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        return true;
    } else {
        return false;
    }
}

// Menggunakan data yang dikirim dari form edit
if (isset($_POST['editData'])) {
    $id = $_POST['PelangganID'];
    $namaPelanggan = $_POST['NamaPelanggan'];
    $alamat = $_POST['Alamat'];
    $nomorTelepon = $_POST['NomorTelepon'];

    // Memanggil fungsi updateData
    if (updateData($id, $namaPelanggan, $alamat, $nomorTelepon)) {
        header('Location: ../admin/admin.php?url=pelanggan');
    } else {
        echo "Gagal mengupdate data.";
    }
}
?>