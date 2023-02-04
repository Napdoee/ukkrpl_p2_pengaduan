<div class="content-header">
    <div class="container">
        <h1 class="m-0">Daftar Pengaduan</h1>
    </div>
</div>
<div class="content">
    <div class="container">
        <div class="card">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th width="5%" class="text-center">#</th>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Judul Laporan</th>
                            <th>Status</th>
                            <th>Foto</th>
                            <th class="text-center">Opsi</th>
                            <?php if($_SESSION['level'] == 'admin') : ?>
                            <th class="text-center">Hapus</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1; 
                        $query = $db->tampilData("pengaduan", "tgl_pengaduan");
                        if(!empty($query)) :
                        foreach($query as $val) :
                        $data = $db->detailData("masyarakat", "nik", $val['nik'])?>
                        <tr>
                            <td class="text-center align-middle"><?= $no++ ?></td>
                            <td class="align-middle"><?= $data['nama'] ?></td>
                            <td class="align-middle"><?= $val['tgl_pengaduan'] ?></td>
                            <td class="align-middle"><?= $val['judul_laporan'] ?></td>
                            <td class="align-middle"><?= $db->statusData($val['status']) ?></td>
                            <td>
                                <img style="width: 150px; height: 80px; object-fit: cover; object-position: center"
                                    src="../assets/image/<?= $val['foto'] ?>" alt="<?= $val['foto'] ?>">
                            </td>
                            <td class="text-center align-middle">
                                <div class="btn-group">
                                    <a href="?page=detail&id=<?= $val['id_pengaduan'] ?>" class="btn btn-primary">
                                        <i class="fas fa-info-circle"></i>
                                    </a>
                                    <a href="?page=tanggapi&id=<?= $val['id_pengaduan'] ?>" class="btn btn-success">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </div>
                            </td>
                            <?php if($_SESSION['level'] == 'admin') : ?>
                            <td class="text-center align-middle">
                                <form action="delete.php" method="post" class="d-inline">
                                    <input type="hidden" name="id_pengaduan" value="<?= $val['id_pengaduan'] ?>">
                                    <button onclick="return confirm('Apakah anda yakin ingin menghapus pengaduan ini?')"
                                        type="submit" name="pengaduan" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                            <?php endif; ?>
                        </tr>
                        <?php endforeach; else : ?>
                        <tr>
                            <td colspan="6" align="center">Tidak ada data pengaduan</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>