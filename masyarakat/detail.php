<?php 
    if(isset($_GET['id'])){
        $data = $db->detailData('pengaduan', 'id_pengaduan', $_GET['id']);
        
        $user = $data != NULL ? $user = $db->detailData('masyarakat', 'nik', $data['nik']) : 
        die("<br><br><center>Tidak dapat menemukan info pengaduan</center>");
    } else {
        die("<br><br><center>Tidak dapat menemukan info pengaduan</center>");
    }
?>
<div class="content-header">
    <div class="container">
        <div class="d-flex justify-content-between align-items-start">
            <h4 class="m-0">
                Detail Pengaduan
            </h4>
            <div class="d-flex">
                <?php if($user['nik'] == $_SESSION['userId']) : ?>
                <form action="delete.php" method="POST">
                    <input type="hidden" name="id_pengaduan" value="<?= $data['id_pengaduan'] ?>">
                    <input onclick="return confirm('Apakah anda yakin ingin menghapus tanggapan ini?')" type="submit"
                        name="delete" class="btn btn-outline-danger mr-2" value="Hapus Tanggapan">
                </form>
                <?php endif; ?>
                <a href="?page=home" class="btn btn-outline-primary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="card card-primary">
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
                                <p class="mb-2"><b><?= $user['nama'] ?></b></p>
                                <p class="mb-2"><small><?= $data['tgl_pengaduan'] ?></small></p>
                            </div>
                            <p class="mb-2">Isi Laporan: </p>
                            <?= $data['isi_laporan'] ?>
                        </div>
                    </div>
                </div>
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="card-title">Tanggapan</div>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
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