<?= $this->extend('Admin/layout/main') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <h1><?= esc($title) ?></h1>
    <form action="<?= base_url('Admin/karyawan/update/' . esc($pegawai['id_pegawai'])) ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <!-- NIK -->
        <div class="form-group">
            <label for="nik">NIK</label>
            <input type="text" class="form-control" id="nik" name="nik" value="<?= esc($pegawai['nik']) ?>" required>
        </div>

        <!-- Nama Pegawai -->
        <div class="form-group">
            <label for="nama_pegawai">Nama Pegawai</label>
            <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" value="<?= esc($pegawai['nama_pegawai']) ?>" required>
        </div>

        <!-- Username -->
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?= esc($pegawai['username']) ?>" required>
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="password">Password <small>(Kosongkan jika tidak ingin diubah)</small></label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <!-- Jenis Kelamin -->
        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                <option value="Laki-laki" <?= $pegawai['jenis_kelamin'] == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                <option value="Perempuan" <?= $pegawai['jenis_kelamin'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
            </select>
        </div>

        <!-- Jabatan -->
        <div class="form-group">
            <label for="id_jabatan">Jabatan</label>
            <select class="form-control" id="id_jabatan" name="id_jabatan" required>
                <option value="">Pilih Jabatan</option>
                <?php foreach ($jabatan as $item): ?>
                    <option value="<?= esc($item['id_jabatan']) ?>" <?= $pegawai['id_jabatan'] == $item['id_jabatan'] ? 'selected' : '' ?>>
                        <?= esc($item['nama_jabatan']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Tanggal Masuk -->
        <div class="form-group">
            <label for="tanggal_masuk">Tanggal Masuk</label>
            <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" value="<?= esc($pegawai['tanggal_masuk']) ?>" required>
        </div>

        <!-- Status -->
        <div class="form-group">
            <label for="status">Status</label>
            <input type="text" class="form-control" id="status" name="status" value="<?= esc($pegawai['status']) ?>" required>
        </div>

        <!-- Foto -->
        <div class="form-group">
            <label for="photo">Foto</label>
            <input type="file" class="form-control-file" id="photo" name="photo" accept="image/*">
            <?php if (!empty($pegawai['photo'])): ?>
                <div class="mt-2">
                    <p>Foto saat ini:</p>
                    <img src="<?= base_url('uploads/' . esc($pegawai['photo'])) ?>" alt="Foto Pegawai" style="max-width: 150px; height: auto; border: 1px solid #ddd;">
                </div>
            <?php endif; ?>
        </div>

        <!-- Hak Akses -->
        <div class="form-group">
            <label for="hak_akses">Hak Akses</label>
            <select class="form-control" id="hak_akses" name="hak_akses" required>
                <option value="admin" <?= $pegawai['hak_akses'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                <option value="karyawan" <?= $pegawai['hak_akses'] == 'karyawan' ? 'selected' : '' ?>>Karyawan</option>
            </select>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
<?= $this->endSection() ?>