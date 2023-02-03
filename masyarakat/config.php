<?php 
$page = isset($_GET['page']) ? $_GET['page'] : '';

switch($page) 
{
    case 'home' :
        include "home.php";
        break;
    case 'pengajuan' :
        include "pengajuan.php";
        break;
    case 'detail' :
        include 'detail.php';
        break;
    default :
        include "home.php";
}
?>