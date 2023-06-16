<?php
session_start();
include "../database.php";
$db = new Database();

if (!isset($_SESSION['status'])) {
    return header("location: ../index.php");
}

if ($_SESSION['level'] != 'petugas' && $_SESSION['level'] != 'admin') {
    return $db->alertMsg("Anda harus masuk sebagai petugas untuk mengakses halaman!", '../logout.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Page</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../../AdminLTE/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../AdminLTE/dist/css/adminlte.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="../../AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css" />
    <link rel="stylesheet" href="../../AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css" />
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="?page=dashboard" class="nav-link">Home</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="../logout.php" class="nav-link">Logout</a>
                </li>
            </ul>
        </nav>

        <!-- Sidebar -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="#" class="brand-link">
                <span class="brand-text font-weight-light">Pengaduan Masyarakat</span>
            </a>
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../../AdminLTE/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><b><?= $_SESSION['username'] ?></b></a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="?page=pengaduan" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Verifikasi Pengaduan
                                    <?= ($db->jmlPengaduan() > 0 ?
                                        '<span class="right badge badge-danger">' . $db->jmlPengaduan() . '</span>' : "") ?>
                                </p>
                            </a>
                        </li>
                        <?php if ($_SESSION['level'] == 'admin') : ?>
                        <li class="nav-item collapsed">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Master
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="?page=tanggapan" class="nav-link">
                                        <i class="fas fa-book nav-icon"></i>
                                        <p>Data Tanggapan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?page=petugas" class="nav-link">
                                        <i class="far fa-user nav-icon"></i>
                                        <p>Data Petugas</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?page=masyarakat" class="nav-link">
                                        <i class="far fa-user nav-icon"></i>
                                        <p>Data Masyarakat</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="?page=laporan" class="nav-link">
                                <i class="nav-icon fas fa-print"></i>
                                <p>
                                    Laporan
                                </p>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <?php include "config.php" ?>
        </div>
        <!-- /.content-wrapper -->

        <!-- <footer class="main-footer">
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer> -->
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="../../AdminLTE/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="../../AdminLTE/plugins/chart.js/Chart.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../AdminLTE/dist/js/adminlte.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="../../AdminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script>
    $(function() {
        $("#example2").DataTable({
            responsive: true,
            lengthChange: true,
            ordering: true,
            paging: false,
            info: false,
            autoWidth: false,
            searching: false,
        });
    });
    </script>
    <script>
    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    // var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
    <?php $data = $db->query("SELECT tgl_pengaduan as TglPengaduan, COUNT(*) as JmlPengaduan FROM `pengaduan` GROUP BY tgl_pengaduan;") ?>

    var areaChartData = {
        labels: [<?php foreach ($data as $x) {
                            echo '"' . $x['TglPengaduan'] . '", ';
                        } ?>],
        datasets: [{
            label: 'Data Pengaduan',
            backgroundColor: 'rgba(60,141,188,0.9)',
            borderColor: 'rgba(60,141,188,0.8)',
            pointRadius: false,
            pointColor: '#3b8bba',
            pointStrokeColor: 'rgba(60,141,188,1)',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data: [<?php foreach ($data as $x) {
                            echo '"' . $x['JmlPengaduan'] . '", ';
                        } ?>]
        }, ]
    }

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')

    var barChartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        datasetFill: false
    }

    new Chart(barChartCanvas, {
        type: 'bar',
        data: areaChartData,
        options: barChartOptions
    })
    </script>
</body>

</html>