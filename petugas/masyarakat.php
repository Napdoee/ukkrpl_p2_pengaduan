<?php 
    if(isset($_POST['simpan'])) {
        $nik = $_POST['nik'];
        $nama = $_POST['nama'];
        $notelp = $_POST['notelp'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password = MD5($password);
    
        $query = $db->register($nik, $nama, $username, $password, $notelp);
    
        if($query){
            $db->alertMsg("Data berhasil disimpan", "?page=masyarakat");
        } 
    }
?>
<div class="content-header">
    <div class="container">
        <h1 class="mb-1">Data Masyarakat</h1>
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-default">
            <i class="fas fa-plus"></i>
            Tambah
        </button>
    </div>
</div>
<div class="content">
    <div class="container">
        <div class="card">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th width="5%" class="text-center">#</th>
                        <th width="15%">NIK</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>No. Telp</th>
                        <th class="text-center">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1; 
                    $query = $db->tampilData("masyarakat", "nama");
                    if(!empty($query)) :
                    foreach($query as $val) :
                    ?>
                    <tr>
                        <td class="text-center align-middle"><?= $no++ ?></td>
                        <td class="align-middle"><?= $val['nik'] ?></td>
                        <td class="align-middle"><?= $val['nama'] ?></td>
                        <td class="align-middle"><?= $val['username'] ?></td>
                        <td class="align-middle"><?= $val['telp'] ?></td>
                        <td class="text-center align-middle">
                            <a href="?page=edit&act=masyarakat&id=<?= $val['nik'] ?>" class="btn btn-warning">
                                <i class="fas fa-pen"></i>
                            </a>
                            <form action="delete.php" method="post" class="d-inline">
                                <input type="hidden" name="nik" value="<?= $val['nik'] ?>">
                                <button onclick="return confirm('Apakah anda yakin ingin menghapus masyarakat ini?')"
                                    type="submit" name="masyarakat" class="btn btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; else : ?>
                    <tr>
                        <td colspan="6" align="center">Tidak ada data masyarakat</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Masyarakat</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="number" class="form-control" name="nik" id="nik"
                            placeholder="Masukkan Nomor Induk Keluarga" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan nama"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="notelp">No. Telp</label>
                        <input type="number" class="form-control" name="notelp" id="notelp" placeholder="Masukkan Nomor"
                            required>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username"
                            placeholder="Masukkan username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password"
                            placeholder="Masukkan password" required>
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>