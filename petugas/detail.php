<?php 
    if(isset($_GET['id'])){
        $data = $db->detailData('pengaduan', 'id_pengaduan', $_GET['id']);
        $user = $db->detailData('masyarakat', 'nik', $data['nik']);
    } else {
        die("<center>Tidak dapat menemukan info pengaduan</center>");
    }

    if(isset($_POST['pending'])){
        $db->setStatus($_GET['id'], '0');
        echo "<script>window.location='?page=pengaduan'</script>";
    } 
    else if(isset($_POST['proses'])){
        $db->setStatus($_GET['id'], 'proses');
        echo "<script>window.location='?page=pengaduan'</script>";
    } 
    else if(isset($_POST['selesai'])){
        $db->setStatus($_GET['id'], 'selesai');
        echo "<script>window.location='?page=pengaduan'</script>";
    } 
?>
<div class="content-header">
    <div class="container">
        <div class="row align-items-center">
            <h4 class="col-12 col-md-6 mb-2 mb-md-0 m-0">
                Detail Pengaduan
            </h4>
            <div class="col-12 col-md-6 d-flex justify-content-md-end">
                <!-- <div class="btn-group"> -->
                <?php if($_SESSION['level'] == 'admin') : ?>
                <form action="delete.php" method="POST" class="d-inline mx-1">
                    <input type="hidden" name="id_pengaduan" value="<?= $data['id_pengaduan'] ?>">
                    <button onclick="return confirm('Apakah anda yakin ingin menghapus pengaduan ini?')" type="submit"
                        name="pengaduan" class="btn btn-outline-danger">
                        <i class="fas fa-trash"></i> Hapus
                    </button>
                </form>
                <?php endif; ?>
                <a href="?page=tanggapi&id=<?= $data['id_pengaduan'] ?>" class="btn btn-outline-success mx-1">
                    <i class="fas fa-edit"></i> Tanggapi
                </a>
                <!-- </div> -->
                <a href="?page=pengaduan" class="btn btn-outline-primary mx-1">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container">
        <div class="row">
            <div class="order-2 order-md-1 col-12 col-md-6">
                <div class="card card-lightblue">
                    <div class="card-header">
                        <div class="card-title">Detail Pengaduan</div>
                        <div class="card-tools">
                            <?= $db->statusData($data['status']) ?>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div id="accordion">
                            <div class="card shadow-none">
                                <div class="card-header">
                                    <a class="d-flex justify-content-between text-dark" data-toggle="collapse"
                                        href="#collapseOne">
                                        <div class="card-title">
                                            <p class="mb-1 font-weight-bolder"><?= $data['judul_laporan'] ?></p>
                                            <h6>Pelapor: <?= $user['nama'] ?></h6>
                                        </div>
                                        <div class="card-tools">
                                            <small><?= $data['tgl_pengaduan'] ?></small>
                                        </div>
                                    </a>
                                </div>
                                <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                    <div class="card-body">
                                        <?= $data['isi_laporan'] ?>
                                    </div>
                                </div>
                            </div>
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
                        <!-- <div style="max-height: 200px" class="overflow-auto"> -->
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
                        <!-- </div> -->
                    </div>
                </div>
            </div>
            <div class="order-1 mb-2 mb-md-0 col-12 col-md-6 text-center">
                <?php if($_SESSION['level'] == 'admin') : ?>
                <div class="card card-lightblue">
                    <div class="card-header">
                        <div class="card-title">Status Pengaduan</div>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="btn-group w-100">
                                <button type="submit" name="pending" class="btn btn-danger"
                                    <?= $data['status'] == '0' ? 'disabled' : ''  ?>>Pending</button>
                                <button type="submit" name="proses" class="btn btn-warning"
                                    <?= $data['status'] == 'proses' ? 'disabled' : ''  ?>>Proses</button>
                                <button type="submit" name="selesai" class="btn btn-success"
                                    <?= $data['status'] == 'selesai' ? 'disabled' : ''  ?>>Selesai</button>
                            </div>
                        </form>
                    </div>
                </div>
                <?php endif; ?>
                <div style="max-height: 350px;" class="overflow-auto">
                    <img style="width: 100%;" class="img-fluid img-rounded shadow-sm"
                        src="../assets/image/<?= $data['foto'] ?>" alt="<?= $data['foto'] ?>">
                </div>
            </div>
        </div>
    </div>
</div>