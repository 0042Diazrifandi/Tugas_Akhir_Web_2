<?= $this->extend('/Admin/layout/main') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <h2 class="mb-3">Edit Data Jabatan</h2>

    <!-- Form Edit -->
    <form action="<?= base_url('Admin/dataJabatan/update/' . $jabatan['id_jabatan']) ?>" method="post">
        <div class="mb-3">
            <label for="nama_jabatan" class="form-label">Nama Jabatan</label>
            <input type="text" class="form-control" id="nama_jabatan" name="nama_jabatan" value="<?= esc($jabatan['nama_jabatan']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
            <input type="number" class="form-control" id="gaji_pokok" name="gaji_pokok" value="<?= esc($jabatan['gaji_pokok']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="tj_transpot" class="form-label">Tunjangan Transport</label>
            <input type="number" class="form-control" id="tj_transpot" name="tj_transpot" value="<?= esc($jabatan['tj_transpot']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="uang_makan" class="form-label">Uang Makan</label>
            <input type="number" class="form-control" id="uang_makan" name="uang_makan" value="<?= esc($jabatan['uang_makan']) ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
<?= $this->endSection() ?>