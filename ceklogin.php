<?php 
session_start();

include "database.php";
$db = new Database();

if(isset($_POST['submit']))
{
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $pass = MD5($pass);

    $check = $db->cekLogin($user, $pass);

    if($check == 'petugas'){
        $data = $db->userDetail($check, $user, $pass);

        $db->setSession($data['nama_petugas'], $data['id_petugas'], $data['level'], true);
        header("location: petugas/");
    } else if($check == 'masyarakat'){
        $data = $db->userDetail($check, $user, $pass);

        $db->setSession($data['nama'], $data['nik'], 'masyarakat', true);
        header("location: index.php");
    } else {
        echo "<script>alert('Username atau Password anda salah!');window.location='index.php'</script>";
    }
}