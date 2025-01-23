<?= $this->extend('Karyawan/layout/main') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <h1><?= esc($title) ?></h1>

    <?php if ($gaji): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Pegawai</th>
                    <th>Gaji Pokok</th>
                    <th>Tunjangan Transport</th>
                    <th>Uang Makan</th>
                    <th>Potongan Alpha</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= esc($gaji['nama_pegawai']) ?></td>
                    <td>Rp <?= number_format($gaji['gaji_pokok'], 0, ',', '.') ?></td>
                    <td>Rp <?= number_format($gaji['tj_transpot'], 0, ',', '.') ?></td>
                    <td>Rp <?= number_format($gaji['uang_makan'], 0, ',', '.') ?></td>
                    <td>Rp <?= number_format($gaji['alpha'], 0, ',', '.') ?></td>
                </tr>
            </tbody>
        </table>
    <?php else: ?>
        <p>Data gaji tidak ditemukan.</p>
    <?php endif; ?>
</div>
<?= $this->endSection() ?>