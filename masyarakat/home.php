<div class="content-header">
    <div class="container">
        <h1 class="m-0">Daftar Pengaduan</h1>
    </div>
</div>
<div class="content">
    <div class="container">
        <div class="card">
            <div class="table-responsive">
                <table id="example2" class="table table-hover">
                    <thead>
                        <tr>
                            <th width="5%" class="text-center">#</th>
                            <th>Nama</th>
                            <th>Tanggal Pengaduan</th>
                            <th>Judul Laporan</th>
                            <th>Foto</th>
                            <th>Status</th>
                            <th class="text-center">Detail</th>
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
                            <td>
                                <img style="width: 120px; height: 100px; object-fit: contain;"
                                    src="../assets/image/<?= $val['foto'] ?>" alt="<?= $val['foto'] ?>">
                            </td>
                            <td class="align-middle">
                                <?= $db->statusData($val['status']) ?>
                            </td>
                            <td class="text-center align-middle">
                                <a href="?page=detail&id=<?= $val['id_pengaduan'] ?>" class="btn btn-primary">Detail</a>
                            </td>
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