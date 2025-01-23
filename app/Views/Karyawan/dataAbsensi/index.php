<?= $this->extend('Karyawan/layout/main') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <h1><?= esc($title) ?></h1>

    <?php if ($absensi): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Bulan</th>
                    <th>Hadir</th>
                    <th>Sakit</th>
                    <th>Alpha</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($absensi as $item): ?>
                    <tr>
                        <td><?= esc($item['bulan']) ?></td>
                        <td><?= esc($item['hadir']) ?></td>
                        <td><?= esc($item['sakit']) ?></td>
                        <td><?= esc($item['alpha']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Data absensi tidak ditemukan.</p>
    <?php endif; ?>
</div>
<?= $this->endSection() ?>
