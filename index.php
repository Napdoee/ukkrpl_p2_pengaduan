<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>APP Pengaduan Masyarakat</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="#" class="navbar-brand">
                    <span class="brand-text font-weight-light"><b>Pengaduan Masyarakat</b></span>
                </a>
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <?php if(!isset($_SESSION['status'])) :?>
                    <li class="nav-item">
                        <a href="register.php" class="nav-link">Daftar Akun</a>
                    </li>
                    <li class="nav-item">
                        <a href="login.php" class="nav-link">Login</a>
                    </li>
                    <?php else : ?>
                    <li class="nav-item">
                        <a href="masyarakat/?page=home" class="nav-link">Daftar Pengaduan</a>
                    </li>
                    <li class="nav-item">
                        <a href="masyarakat/?page=pengajuan" class="nav-link">Pengaduan</a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link">Logout</a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container">
                    <h1>Selamat datang
                        <?= isset($_SESSION['username'] ) ? $_SESSION['username'] : 'di aplikasi Pengaduan Masyarakat' ?>
                    </h1>
                </div>
            </div>
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-8">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h5 class="card-title m-0">Mengajukan Laporan Pengaduan</h5>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">
                                        Website ini bertujuan untuk mengadukan laporan dari masyarakat untuk nantinya
                                        akan ditanggapi oleh petugas, untuk mengadukan laporan kalian butuh mendaftarkan
                                        akun sebagai masyarakat dan ikuti cara mengajukan laporan pengaduan nantinya
                                        kalian dapat melihat daftar pengaduan.
                                    </p>
                                    <?php if(!isset($_SESSION['status'])) : ?>
                                    <p>Jika tidak memiliki akun segera daftarkan dibawah ini.</p>
                                    <a href="register.php" class="btn btn-primary">Daftarkan akun masyarakat</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Cara mengajukan laporan pengaduan: </h5>
                                    <p class="card-text">
                                        <li>Masukkan akun anda sebagai masyarakat</li>
                                        <li>Masuk kehalaman pengaduan</li>
                                        <li>Isi form pengaduan dengan benar dan jelas</li>
                                        <li>Pastikan disertai dengan bukti berupa foto</li>
                                    </p>
                                    <!-- <a href="#" class="card-link">Card link</a>
                                    <a href="#" class="card-link">Another link</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>