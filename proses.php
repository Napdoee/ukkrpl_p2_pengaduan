<?php 
require "database.php";
$db = new Database();

if(isset($_POST['register']))
{
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $notelp = $_POST['notelp'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = MD5($password);

    $query = $db->register($nik, $nama, $username, $password, $notelp);

    if($query){
        $db->alertMsg("Akun berhasil diregistrasi, silahkan login", "login.php");
    } else {
        echo mysqli_error();
    }
}