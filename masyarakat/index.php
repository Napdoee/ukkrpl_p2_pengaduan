<?php 
    session_start(); 
    include "../database.php";
    $db = new Database();

    if(!isset($_SESSION['status'])){
        return header("location: ../index.php");
    }

    if($_SESSION['level'] != 'masyarakat'){
       return $db->alertMsg("Anda harus masuk sebagai masyarakat untuk mengakses halaman!", '../logout.php');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>APP Pengaduan Masyarakat</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../assets/plugins/summernote/summernote-bs4.min.css">
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="../index.php" class="navbar-brand">
                    <span class="brand-text font-weight-light"><b>Pengaduan</b> Masyarakat</span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse"
                    data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button> <!-- Right navbar links -->
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <li class="nav-item">
                        <a href="?page=home" class="nav-link">Daftar Pengaduan</a>
                    </li>
                    <li class="nav-item">
                        <a href="?page=pengajuan" class="nav-link">Pengaduan</a>
                    </li>
                    <li class="nav-item">
                        <a href="../logout.php" class="nav-link">Logout</a>
                    </li>

                </ul>
            </div>
        </nav>
        <div class="content-wrapper">
            <?php include "config.php" ?>
        </div>
    </div>

    <!-- REQUIRED SCRIPTS -->

    <script src="../assets/script.js"></script>
    <!-- jQuery -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../assets/dist/js/adminlte.min.js"></script>
    <!-- Summernote -->
    <script src="../assets/plugins/summernote/summernote-bs4.min.js"></script>
    <script>
    $(function() {
        // Summernote
        $('#isi').summernote()
    });
    </script>
</body>

</html>