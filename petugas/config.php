<?php 
$page = isset($_GET['page']) ? $_GET['page'] : '';

switch($page) 
{
    case 'home' :
        include "home.php";
        break;
    case 'detail' :
        include 'detail.php';
        break;
    case 'tanggapi' :
        include 'tanggapi.php';
        break;
    case 'tanggapan' :
        include 'tanggapan.php';
        break;
    case 'laporan' :
        include 'laporan.php';
        break;
    case 'delete' :
        include 'delete.php';
        break;
    case 'petugas' :
        include 'petugas.php';
        break;
    case 'masyarakat' :
        include 'masyarakat.php';
        break;
    case 'edit' :
        include 'edit.php';
        break;
    case 'dashboard' :
        include 'dashboard.php';
        break;
    default :
        include "home.php";
}
?>