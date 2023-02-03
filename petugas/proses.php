<?php 
include "../database.php";
$db = new Database();

if(isset($_GET['act']))
{
     if($_GET['act'] == 'petugas'){
        $nama = $_POST['nama_petugas'];
        $telp = $_POST['notelp'];
        $level = $_POST['level'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $oldPassword = $_POST['oldPassword'];
        
        if($password != ''){
            $password = md5($password);
        } else {
            $password = $oldPassword;
        }

        $query = $db->editPetugas($_GET['id'], $nama, $username, $password, $telp, $level);

    } else if($_GET['act'] == 'masyarakat') {
        $nik = $_POST['nik'];
        $nama = $_POST['nama'];
        $notelp = $_POST['notelp'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $oldPassword = $_POST['oldPassword'];
        
        if($password != ''){
            $password = md5($password);
        } else {
            $password = $oldPassword;
        }

        $query = $db->editMasyarakat($nik, $nama, $username, $password, $notelp);
        
    } else {
        header("location: index.php?page=$_GET[act]");
    }

    
    if($query){
        $loc = "index.php?page=$_GET[act]";
        $db->alertMsg('Data berhasil diubah', $loc);
    } else {
        echo mysqli_error();
    }
}

?>