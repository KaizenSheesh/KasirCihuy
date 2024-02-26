<?php
$koneksi = mysqli_connect("localhost", "root", "", "kasirvanila");
if(!$koneksi) {
    echo "Koneksi Gagal";
}