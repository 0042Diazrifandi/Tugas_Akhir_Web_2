<?= $this->extend('/Admin/layout/main') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <h2><?= $title ?></h2>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>NIK</th>
                <th>Nama Pegawai</th>
                <th>Jabatan</th>
                <th>Bulan</th>
                <th>Hadir</th>
                <th>Sakit</th>
                <th>Alpha</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($absensi)): ?>
                <?php foreach ($absensi as $data): ?>
                    <tr>
                        <td><?= $data['nik'] ?></td>
                        <td><?= $data['nama_pegawai'] ?></td>
                        <td><?= $data['jabatan'] ?></td>
                        <td><?= $data['bulan'] ?></td>
                        <td><?= $data['hadir'] ?></td>
                        <td><?= $data['sakit'] ?></td>
                        <td><?= $data['alpha'] ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" class="text-center">Data absensi tidak tersedia.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>
