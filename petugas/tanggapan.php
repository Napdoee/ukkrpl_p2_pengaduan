<div class="content-header">
    <div class="container">
        <h1 class="m-0">Data Tanggapan</h1>
    </div>
</div>
<div class="content">
    <div class="container">
        <div class="card">
            <table id="example2" class="table table-hover">
                <thead>
                    <tr>
                        <th width="5%" class="text-center">#</th>
                        <th>Petugas</th>
                        <!-- <th>ID Pengaduan</th> -->
                        <th>Tanggal</th>
                        <th>Tanggapan</th>
                        <th width="10%" class="text-center">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $no = 1; 
                        $query = $db->tampilData("tanggapan", "tgl_tanggapan");
                        if(!empty($query)) :
                        foreach($query as $val) :
                        $data = $db->detailData("petugas", "id_petugas", $val['id_petugas'])?>
                    <tr>
                        <td class="text-center align-middle"><?= $no++ ?></td>
                        <td class="align-middle"><?= $data['nama_petugas'] ?> (<?= $data['id_petugas'] ?>)</td>
                        <!-- <td class="align-middle"><?= $val['id_pengaduan'] ?></td> -->
                        <td class="align-middle text-nowrap"><?= $val['tgl_tanggapan'] ?></td>
                        <td class="align-middle"><?= $val['tanggapan'] ?></td>
                        <td class="text-center align-middle">
                            <form action="delete.php" method="post" class="d-inline">
                                <input type="hidden" name="id_tanggapan" value="<?= $val['id_tanggapan'] ?>">
                                <button onclick="return confirm('Apakah anda yakin ingin menghapus tanggapan ini?')"
                                    type="submit" name="tanggapan" class="btn btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; else : ?>
                    <tr>
                        <td colspan="6" align="center">Tidak ada data tanggapan</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>