<?= $this->extend('/Admin/layout/main') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <h2 class="mb-3">Data Gaji Karyawan</h2>

    <!-- Filter Data -->
    <div class="card mb-3">
        <div class="card-body">
            <form method="get" action="<?= base_url('GajiController/filter') ?>">
                <div class="row">
                    <div class="col-md-4">
                        <label for="bulan" class="form-label">Bulan:</label>
                        <select id="bulan" name="bulan" class="form-select">
                            <option value="">--Pilih Bulan--</option>
                            <?php foreach (range(1, 12) as $bulan): ?>
                                <option value="<?= $bulan ?>" <?= ($bulan == ($bulan_filter ?? '')) ? 'selected' : '' ?>>
                                    <?= date('F', mktime(0, 0, 0, $bulan, 10)) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="tahun" class="form-label">Tahun:</label>
                        <select id="tahun" name="tahun" class="form-select">
                            <option value="">--Pilih Tahun--</option>
                            <?php for ($tahun = date('Y'); $tahun >= 2000; $tahun--): ?>
                                <option value="<?= $tahun ?>" <?= ($tahun == ($tahun_filter ?? '')) ? 'selected' : '' ?>>
                                    <?= $tahun ?>
                                </option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <div class="col-md-4 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary">Tampilkan Data</button>
                        <a href="<?= base_url('GajiController/cetak') ?>" target="_blank" class="btn btn-success ms-2">Cetak Daftar Gaji</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Data Gaji -->
    <div class="alert alert-info">
        <strong><?= $bulan ? date('F', mktime(0, 0, 0, $bulan, 10)) : 'Semua' ?></strong> Tahun: <strong><?= $tahun ?? 'Semua' ?></strong>
    </div>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama Karyawan</th>
                <th>Jenis Kelamin</th>
                <th>Jabatan</th>
                <th>Gaji Pokok</th>
                <th>Tj. Transport</th>
                <th>Uang Makan</th>
                <th>Potongan</th>
                <th>Total Gaji</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($gaji)): ?>
                <?php $no = 1; foreach ($gaji as $g): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $g['nik'] ?></td>
                        <td><?= $g['nama_pegawai'] ?></td>
                        <td><?= $g['jenis_kelamin'] ?></td>
                        <td><?= $g['jabatan'] ?></td>
                        <td><?= number_format($g['gaji_pokok'], 0, ',', '.') ?></td>
                        <td><?= number_format($g['tj_transpot'], 0, ',', '.') ?></td>
                        <td><?= number_format($g['uang_makan'], 0, ',', '.') ?></td>
                        <td><?= number_format($g['potongan'], 0, ',', '.') ?></td>
                        <td><?= number_format($g['total_gaji'], 0, ',', '.') ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="10" class="text-center">Tidak ada data tersedia.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>
