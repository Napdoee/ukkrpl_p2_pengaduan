<div class="content-header">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <button onclick="cetak()" class="btn btn-success" style="margin-left: 5px;">
                <i class="fas fa-print"></i>
                Cetak
            </button>
            <a class="btn btn-default" href="?page=pengaduan">
                <i class="fas fa-arrow-left"></i>
                Data Pengaduan
            </a>
        </div>
    </div>
</div>
<div class="content">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>
                    <i class="fas fa-edit"></i>
                    Laporan Masyarakat
                </h3>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead class="text-nowrap">
                        <tr>
                            <th width="5%" class="text-center">#</th>
                            <th>NIK</th>
                            <!-- <th>Nama</th> -->
                            <th>Tanggal Pengaduan</th>
                            <th>Judul Laporan</th>
                            <th>Isi Pengaduan</th>
                            <th>Status</th>
                            <th>Foto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1; 
                        $query = $db->tampilData("pengaduan", "tgl_pengaduan");
                        if(!empty($query)) :
                        foreach($query as $val) :
                        // $data = $db->detailData("masyarakat", "nik", $val['nik'])?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= $val['nik'] ?> </td>
                            <!-- <td><?= $data['nama'] ?></td> -->
                            <td><?= $val['tgl_pengaduan'] ?></td>
                            <td><?= $val['judul_laporan'] ?></td>
                            <td><?= $val['isi_laporan'] ?></td>
                            <td>
                                <?= $db->statusData($val['status']) ?>
                            </td>
                            <td>
                                <img width="120px" src="../assets/image/<?= $val['foto'] ?>" alt="<?= $val['foto'] ?>">
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

<script type="text/javascript">
function cetak() {
    window.addEventListener("load", window.print());
}
</script>