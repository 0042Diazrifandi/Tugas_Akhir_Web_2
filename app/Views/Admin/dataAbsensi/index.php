<?= $this->extend('/Admin/layout/main') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <h2>Data Absensi</h2>

    <!-- Tombol Input Absensi -->
    <a href="<?= base_url('/absensi/input') ?>" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Input Absensi
    </a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>NIK</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Status Kehadiran</th>
                <th>Tanggal Kehadiran</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($pegawai)): ?>
                <?php foreach ($pegawai as $p): ?>
                    <tr>
                        <td><?= esc($p['nik']) ?></td>
                        <td><?= esc($p['nama_pegawai']) ?></td>
                        <td><?= esc($p['nama_jabatan']) ?></td> <!-- Tampilkan nama jabatan -->
                        <td><?= esc($p['status_kehadiran']) ?></td>
                        <td><?= esc($p['tanggal_kehadiran']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center">Tidak ada data pegawai.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>