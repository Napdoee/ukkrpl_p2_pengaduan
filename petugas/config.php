<?php 
$page = isset($_GET['page']) ? $_GET['page'] : '';

$notAllowedPages = ['delete', 'edit', 'laporan', 'masyarakat', 'petugas', 'proses', 'tanggapan'];
if($_SESSION['level'] == 'petugas' && in_array($page, $notAllowedPages)){
    return $db->alertMsg('Kamu tidak memilki akses!', '?page=dashboard');
}

$path    = './';
$files = array_diff(scandir($path), array('.', '..'));
$filesName = array();

foreach($files as $file){
    $file = explode('.', $file);
    $fileName = $file[0];
    $notAllowed = ['config', 'index', 'proses', 'delete'];

    if(!in_array($fileName, $notAllowed)){
        $filesName[] = $fileName;
    }
}

if(in_array($page, $filesName)){
    include $page.'.php';
} else {
    include "dashboard.php";
}

?>