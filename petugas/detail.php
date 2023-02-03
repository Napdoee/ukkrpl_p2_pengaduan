<?php 
    if(isset($_GET['id'])){
        $data = $db->detailData('pengaduan', 'id_pengaduan', $_GET['id']);
        $user = $db->detailData('masyarakat', 'nik', $data['nik']);
    } else {
        die("<center>Tidak dapat menemukan info pengaduan</center>");
    }

    if(isset($_POST['pending'])){
        $db->setStatus($_GET['id'], '0');
        echo "<script>window.location='?page=home'</script>";
    } 
    else if(isset($_POST['proses'])){
        $db->setStatus($_GET['id'], 'proses');
        echo "<script>window.location='?page=home'</script>";
    } 
    else if(isset($_POST['selesai'])){
        $db->setStatus($_GET['id'], 'selesai');
        echo "<script>window.location='?page=home'</script>";
    } 
?>
<div class="content-header">
    <div class="container">
        <div class="d-flex justify-content-between align-items-start">
            <h4 class="m-0">
                Detail Pengaduan
            </h4>
            <a href="?page=home" class="btn btn-outline-primary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
</div>
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <?php if($_SESSION['level'] == 'admin') : ?>
                <div class="card card-lightblue">
                    <div class="card-header">
                        <div class="card-title">Status Pengaduan</div>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="row">
                                <div class="col-12">
                                    <!-- <div class="btn-group"> -->
                                    <button type="submit" name="pending" class="btn btn-danger"
                                        <?= $data['status'] == '0' ? 'disabled' : ''  ?>>Pending</button>
                                    <button type="submit" name="proses" class="btn btn-warning"
                                        <?= $data['status'] == 'proses' ? 'disabled' : ''  ?>>Proses</button>
                                    <button type="submit" name="selesai" class="btn btn-success"
                                        <?= $data['status'] == 'selesai' ? 'disabled' : ''  ?>>Selesai</button>
                                    <!-- </div> -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <?php endif; ?>
                <div class="card card-lightblue">
                    <div class="card-header">
                        <div class="card-title">Detail Pengaduan</div>
                        <div class="card-tools">
                            <?= $db->statusData($data['status']) ?>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-text">
                            <div class="d-flex justify-content-between align-items-center">
                                <p><b><?= $user['nama'] ?></b></p>
                                <p><small><?= $data['tgl_pengaduan'] ?></small></p>
                            </div>
                            Isi Laporan:
                            <br>
                            <?= $data['isi_laporan'] ?>
                        </div>
                    </div>
                </div>
                <div class="card card-lightblue collapsed-card">
                    <div class="card-header">
                        <div class="card-title">Tanggapan</div>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-text">
                            <?php 
                                $query = $db->query("SELECT * FROM tanggapan WHERE id_pengaduan = $_GET[id]");
                                if(!empty($query)) :
                                foreach($query as $val) :
                                $petugas = $db->detailData("petugas", "id_petugas", $val['id_petugas']);
                            ?>
                            <div class="d-flex justify-content-between align-items-center">
                                <p><b>Petugas:</b> <?= $petugas['nama_petugas'] ?></p>
                                <p><small><?= $val['tgl_tanggapan'] ?></small></p>
                            </div>
                            <?= $val['tanggapan'] ?>
                            <hr>
                            <?php endforeach; else :?>
                            <p>Belum ada tanggapan</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 text-center">
                <img class="img-thumbnail img-rounded shadow-sm" src="../assets/image/<?= $data['foto'] ?>"
                    alt="<?= $data['foto'] ?>">
            </div>
        </div>
    </div>
</div>