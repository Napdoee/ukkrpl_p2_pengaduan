<div class="content-header">
    <div class="container">
        <h1 class="m-0">Laporan Pengaduan</h1>
    </div>
</div>
<div class="content">
    <div class="container">
        <div class="card card-primary">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" id="nama" class="form-control" value="<?= $_SESSION['username'] ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="date">Tanggal Pengaduan</label>
                        <input type="text" id="date" class="form-control" value="<?= date('m/d/Y') ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="judul">Judul Laporan</label>
                        <input type="text" name="judul" id="judul" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="isi">Isi Laporan</label>
                        <textarea name="isi" id="isi" rows="3" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="foto">Bukti Laporan</label><br>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="foto" name="foto" onchange="previewImg()"
                                required>
                            <label class="custom-file-label" for="foto" id="fotoLabel">Pilih gambar</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary">Kirim Pengaduan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php 
    if(isset($_POST['submit'])) 
    {
        $idUser = $_SESSION['userId'];
        $judul  = $_POST['judul'];
        $isi    = $_POST['isi'];
        $file   = $_FILES['foto'];

        $extensi = explode('.', $file['name']);
        $fileName = time().".".end($extensi);

        $query = $db->pengaduan($idUser, $judul, $isi, $fileName);
        if($query){
            move_uploaded_file($file['tmp_name'], '../assets/image/'.$fileName);
            $db->alertMsg("Berhasil mengajukan laporan!", "?page=home");
        } 
    }
?>