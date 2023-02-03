<?php 
    if(isset($_GET['id'])){
        $data = $db->detailData('pengaduan', 'id_pengaduan', $_GET['id']);
        $user = $db->detailData('masyarakat', 'nik', $data['nik']);
    } else {
        die("<center>Tidak dapat menemukan info pengaduan</center>");
    }

    if(isset($_POST['simpan'])) 
    {
        $id_pengaduan = $_GET['id'];
        $tanggapan    = $_POST['tanggapan'];
        $petugas      = $_SESSION['userId'];

        $query = $db->tanggapan($id_pengaduan, $petugas, $tanggapan);
        if($query){
            $db->alertMsg("Berhasil menanggapi laporan!", "?page=home");
        } 
    }
?>
<div class="content-header">
    <div class="container">
        <div class="d-flex justify-content-between align-items-start">
            <h1 class="m-0">
                Menanggapi Pengaduan
                <br>
                <a href="?page=detail&id=<?= $_GET['id'] ?>" class="btn btn-outline-primary mt-2">
                    Lihat Detail</a>
            </h1>
            <a href="?page=home" class="btn btn-outline-primary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
</div>
<div class="content">
    <div class="container">
        <!-- <div class="card">
            <div class="card-header">
                <div class="card-title">Status Pengaduan</div>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-12">
                            <div class="btn-group">
                            <button type="submit" name="pending" class="btn btn-danger">Pending</button>
                            <button type="submit" name="proses" class="btn btn-warning">Proses</button>
                            <button type="submit" name="selesai" class="btn btn-success">Selesai</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div> -->
        <div class="card card-primary">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label for="pengadu">Nama Pengaduan</label>
                        <input type="text" id="pengadu" class="form-control"
                            value="<?= $user['nama']." - ".$user['nik'] ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="nama">Petugas</label>
                        <input type="text" id="nama" class="form-control" value="<?= $_SESSION['username'] ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="date">Tanggal Tanggapan</label>
                        <input type="text" id="date" class="form-control" value="<?= date('m/d/Y') ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="tanggapan">Tanggapan</label>
                        <textarea name="tanggapan" id="tanggapan" rows="3" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="simpan" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>