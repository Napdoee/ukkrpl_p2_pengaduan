<?php 
$page = isset($_GET['page']) ? $_GET['page'] : '';

$path    = './';
$files = array_diff(scandir($path), array('.', '..'));
$filesName = array();

foreach($files as $file){
    $file = explode('.', $file);
    $fileName = $file[0];
    $notAllowed = ['config', 'index', 'delete'];

    if(!in_array($fileName, $notAllowed)){
        $filesName[] = $fileName;
    }
}

if(in_array($page, $filesName)){
    include $page.'.php';
} else {
    include "home.php";
}

?>