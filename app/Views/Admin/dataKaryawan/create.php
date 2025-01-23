<?= $this->extend('Admin/layout/main') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <h1><?= $title ?></h1>
    <form enctype="multipart/form-data" action="<?= base_url('Admin/karyawan/store') ?>" method="POST">
        <?= csrf_field() ?>
        <div class="form-group">
            <label for="nik">NIK</label>
            <input type="text" class="form-control" id="nik" name="nik" required>
        </div>
        <div class="form-group">
            <label for="nama_pegawai">Nama Pegawai</label>
            <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" required>
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="id_jabatan">Jabatan</label>
            <select class="form-control" id="id_jabatan" name="id_jabatan" required>
                <option value="">Pilih Jabatan</option>
                <?php foreach ($jabatan as $row): ?>
                    <option value="<?= $row['id_jabatan']; ?>">
                        <?= $row['nama_jabatan']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="tanggal_masuk">Tanggal Masuk</label>
            <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <input type="text" class="form-control" id="status" name="status" required>
        </div>
        <?= csrf_field() ?>

        <div class="form-group">
            <label for="photo">Foto</label>
            <input type="file" class="form-control-file" id="photo" name="photo" accept="image/*">
        </div>

        <div class="form-group">
            <label for="hak_akses">Hak Akses</label>
            <select class="form-control" id="hak_akses" name="hak_akses">
                <option value="admin">Admin</option>
                <option value="karyawan">Karyawan</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
<?= $this->endSection() ?>