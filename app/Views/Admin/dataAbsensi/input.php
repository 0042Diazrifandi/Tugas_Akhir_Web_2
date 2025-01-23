<?= $this->extend('/Admin/layout/main') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <h2>Input Absensi</h2>
    <form action="<?= base_url('/absensi/simpan') ?>" method="post">
        <?= csrf_field() ?>
        <div class="mb-3">
            <label for="nik" class="form-label">NIK</label>
            <input type="text" id="nik" name="nik" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="status_kehadiran" class="form-label">Status Kehadiran</label>
            <select id="status_kehadiran" name="status_kehadiran" class="form-select" required>
                <option value="Hadir">Hadir</option>
                <option value="Izin">Izin</option>
                <option value="Sakit">Sakit</option>
                <option value="Alfa">Alfa</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="tanggal_kehadiran" class="form-label">Tanggal Kehadiran</label>
            <input type="date" id="tanggal_kehadiran" name="tanggal_kehadiran" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
<?= $this->endSection() ?>