<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<h1><?= $title ?></h1>

<!-- Form Filter -->
<?php if (!isset($cetak)): ?>
    <form method="get" action="<?= base_url('/gaji/filterLaporan') ?>">
        <div class="form-group">
            <label for="bulan">Bulan</label>
            <select name="bulan" id="bulan" class="form-select">
                <option class="form-control" value="">-- Pilih Bulan --</option>
                <?php for ($i = 1; $i <= 12; $i++): ?>
                    <option value="<?= str_pad($i, 2, '0', STR_PAD_LEFT) ?>" <?= ($bulan == str_pad($i, 2, '0', STR_PAD_LEFT)) ? 'selected' : '' ?>>
                        <?= date('F', mktime(0, 0, 0, $i, 10)) ?>
                    </option>
                <?php endfor; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="tahun">Tahun</label>
            <select name="tahun" id="tahun" class="form-control">
                <option value="">-- Pilih Tahun --</option>
                <?php for ($i = 2020; $i <= date('Y'); $i++): ?>
                    <option value="<?= $i ?>" <?= ($tahun == $i) ? 'selected' : '' ?>><?= $i ?></option>
                <?php endfor; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Filter</button>
    </form>
<?php endif; ?>

<!-- Tabel Hasil Filter -->
<?php if (!empty($gaji)): ?>
    <h2>Data Gaji Karyawan</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>NIK</th>
                <th>Nama Pegawai</th>
                <th>Jabatan</th>
                <th>Gaji Pokok</th>
                <th>Tunjangan Transport</th>
                <th>Uang Makan</th>
                <th>Potongan</th>
                <th>Total Gaji</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($gaji as $data): ?>
                <tr>
                    <td><?= $data['nik'] ?></td>
                    <td><?= $data['nama_pegawai'] ?></td>
                    <td><?= $data['jabatan'] ?></td>
                    <td><?= number_format($data['gaji_pokok'], 2, ',', '.') ?></td>
                    <td><?= number_format($data['tj_transpot'], 2, ',', '.') ?></td>
                    <td><?= number_format($data['uang_makan'], 2, ',', '.') ?></td>
                    <td><?= number_format($data['potongan'], 2, ',', '.') ?></td>
                    <td><?= number_format($data['total_gaji'], 2, ',', '.') ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Data tidak ditemukan untuk periode ini.</p>
<?php endif; ?>

<!-- Tombol Cetak -->
<?php if (!isset($cetak)): ?>
    <form method="get" action="<?= base_url('/gaji/cetakLaporan') ?>" target="_blank">
        <input type="hidden" name="bulan" value="<?= $bulan ?>">
        <input type="hidden" name="tahun" value="<?= $tahun ?>">
        <button type="submit" class="btn btn-success">Cetak Laporan</button>
    </form>
<?php endif; ?>

<?= $this->endSection() ?>
