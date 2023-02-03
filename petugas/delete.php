<?php 
    include "../database.php";
    $db = new Database();

    if(isset($_POST['tanggapan'])){
        $query = $db->delete('tanggapan', 'id_tanggapan', $_POST['id_tanggapan']);

        if($query){
            echo "<script>window.location='index.php?page=tanggapan'</script>";
        }
    } else if(isset($_POST['petugas'])){
        $data = $db->delete('petugas', 'id_petugas', $_POST['id_petugas']);

        if($data){
            echo "<script>window.location='index.php?page=petugas'</script>";
        }
    } else if(isset($_POST['masyarakat'])){
        $data = $db->delete('masyarakat', 'nik', $_POST['nik']);

        if($data){
            echo "<script>window.location='index.php?page=masyarakat'</script>";
        }
    } else if(isset($_POST['pengaduan'])) {
        $id = $_POST['id_pengaduan'];
        $query = $db->delete('pengaduan', 'id_pengaduan', $id);
        $data = $db->detailData('pengaduan', 'id_pengaduan', $id);
        
        if($query){
            unlink("../assets/image/".$data['foto']);
            header("location: index.php?page=home");
        }
    }
?>