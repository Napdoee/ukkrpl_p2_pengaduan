<?php 
    if(isset($_GET['act']) && isset($_GET['id']))
    {
        $act = $_GET['act'];
        $id = $_GET['id'];

        if($act == 'petugas') {
            $data = $db->detailData('petugas', 'id_petugas', $id);
        }else if($act == 'masyarakat') {
            $data = $db->detailData('masyarakat', 'nik', $id);
        } else {
            die("<br><center>Tidak ada modul yang ditemukan</center>");
        }
    } else {
        die("<br><center>Tidak ada modul yang ditemukan</center>");
    }
?>
<div class="content-header">
    <div class="container">
        <div class="d-flex justify-content-between align-items-start">
            <h1 class="m-0">
                Edit Petugas
            </h1>
            <a href="?page=<?= $act ?>" class="btn btn-outline-primary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
</div>
<div class="content">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="proses.php?act=<?= $_GET['act'] ?>&id=<?= $_GET['id'] ?>" method="POST">
                    <?php if($act == 'petugas') : ?>
                    <input type="hidden" name="oldPassword" value="<?= $data['password'] ?>">
                    <div class="form-group">
                        <label for="nama_petugas">Nama Petugas</label>
                        <input type="text" class="form-control" name="nama_petugas" id="nama_petugas"
                            placeholder="Masukkan nama" value="<?= $data['nama_petugas'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="notelp">No. Telp</label>
                        <input type="number" class="form-control" name="notelp" id="notelp" placeholder="Masukkan Nomor"
                            value="<?= $data['telp'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="level">Level Petugas</label>
                        <select name="level" class="form-control" required>
                            <option value="">Pilih level</option>
                            <option <?= $data['level'] == 'petugas' ? 'selected' : '' ?> value="petugas">
                                Petugas
                            </option>
                            <option <?= $data['level'] == 'admin' ? 'selected' : '' ?> value="admin">
                                Admin
                            </option>
                        </select>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" value="<?= $data['username'] ?>" class="form-control" name="username"
                            id="username" placeholder="Masukkan username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password"
                            placeholder="Masukkan password">
                    </div>
                    <?php elseif($act == 'masyarakat') : ?>
                    <input type="hidden" name="oldPassword" value="<?= $data['password'] ?>">
                    <input type="hidden" name="nik" value="<?= $data['nik'] ?>">
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="number" class="form-control" id="nik" placeholder="Masukkan Nomor Induk Keluarga"
                            value="<?= $data['nik'] ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan nama"
                            value="<?= $data['nama'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="notelp">No. Telp</label>
                        <input type="number" class="form-control" name="notelp" id="notelp" placeholder="Masukkan Nomor"
                            value="<?= $data['telp'] ?>" required>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username"
                            placeholder="Masukkan username" value="<?= $data['username'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password"
                            placeholder="Masukkan password">
                    </div>
                    <?php endif; ?>
                    <button type="submit" name="ubah" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>