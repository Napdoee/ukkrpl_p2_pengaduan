<?php 
    require "../database.php";
    $db = new Database();
    
    if(isset($_POST['delete']))
    {
        $id = $_POST['id_pengaduan'];
        $data = $db->detailData('pengaduan', 'id_pengaduan', $id);
        $query = $db->delete('pengaduan', 'id_pengaduan', $id);
        
        if($query){
            unlink("../assets/image/".$data['foto']);
            // var_dump($data['foto']); 
            header("location: index.php?page=home");
        }
    }
?>