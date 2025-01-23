<?= $this->extend('/Admin/layout/main') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <h2 class="mb-3">Tambah Data Jabatan</h2>

    <form action="<?= base_url('Admin/dataJabatan/store') ?>" method="post">
        <div class="mb-3">
            <label for="nama_jabatan" class="form-label">Nama Jabatan</label>
            <input type="text" class="form-control" id="nama_jabatan" name="nama_jabatan" required>
        </div>
        <div class="mb-3">
            <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
            <input type="text" class="form-control" id="gaji_pokok" name="gaji_pokok" required>
        </div>
        <div class="mb-3">
            <label for="tj_transpot" class="form-label">Tunjangan Transport</label>
            <input type="text" class="form-control" id="tj_transpot" name="tj_transpot" required>
        </div>
        <div class="mb-3">
            <label for="uang_makan" class="form-label">Uang Makan</label>
            <input type="text" class="form-control" id="uang_makan" name="uang_makan" required>
        </div>
        <div class="mb-3">
            <label for="alpha" class="form-label">Alpha</label>
            <input type="number" class="form-control" id="alpha" name="alpha" required>
        </div>
        <div class="mb-3">
            <label for="id_pegawai" class="form-label">Pegawai</label>
            <select class="form-control" id="id_pegawai" name="id_pegawai" required>
                <option value="">-- Pilih Pegawai --</option>
                <?php if (!empty($pegawai)): ?>
                    <?php foreach ($pegawai as $p): ?>
                        <option value="<?= $p['id_pegawai'] ?>"><?= $p['nama_pegawai'] ?></option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
<?= $this->endSection() ?>