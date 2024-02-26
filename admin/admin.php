<?php
session_start();
if (!isset($_SESSION['nama_petugas'])) {
    header("Location: ../adminlogin.php");
    exit();
}
?>
<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboad - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="admin.php">KasirCuy</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="admin.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php?url=produk">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php?url=pelanggan">Pelanggan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../admin/transaksi.php">Transaksi</a>
                    </li>
                </ul>
                <form class="d-flex justify-content-center align-items-center gap-2">
                    <a onclick="return confirm('Apakah anda yakin ingin logout?')" href="../logout.php" class="btn btn-danger">Logout</a>
                </form>
            </div>
        </div>
    </nav>
    </div>
    <div class="container mt-2">
        <div class="card border-warning">
            <div class="card-body">
                <?php
                $file = @$_GET['url'];
                if (empty($file)) {
                    echo '<h1>Selamat! anda login sebagai admin</h1>';
                } else {
                    include $file . ".php";
                }
                ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>