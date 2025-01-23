<?= $this->extend('/Admin/layout/main') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <h2 class="mb-3">Data Jabatan</h2>

    <!-- Tombol Tambah Data -->
    <a href="<?= base_url('Admin/dataJabatan/create') ?>" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Tambah Data Jabatan
    </a>

    <!-- Tabel Data Jabatan -->
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Jabatan</th>
                <th>Gaji Pokok</th>
                <th>Tunjangan Transport</th>
                <th>Uang Makan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($jabatan)): ?>
                <?php $no = 1; foreach ($jabatan as $j): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= esc($j['nama_jabatan']) ?></td>
                        <td><?= number_format($j['gaji_pokok'], 0, ',', '.') ?></td>
                        <td><?= number_format($j['tj_transpot'], 0, ',', '.') ?></td>
                        <td><?= number_format($j['uang_makan'], 0, ',', '.') ?></td>
                        <td>
                            <a href="<?= base_url('Admin/dataJabatan/edit/' . $j['id_jabatan']) ?>" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="<?= base_url('Admin/dataJabatan/delete/' . $j['id_jabatan']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                <i class="fas fa-trash"></i> Hapus
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center">Tidak ada data tersedia.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>