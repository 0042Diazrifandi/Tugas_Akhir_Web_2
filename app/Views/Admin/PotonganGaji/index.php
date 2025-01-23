<?= $this->extend('/Admin/layout/main') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <h2>Setting Potongan Gaji</h2>

    <!-- Tombol Tambah Data -->
    <a href="<?= base_url('/potongan-gaji/tambah') ?>" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Tambah Potongan Gaji
    </a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Potongan</th>
                <th>Jumlah Potongan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($potonganGaji)): ?>
                <?php $no = 1; foreach ($potonganGaji as $pg): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $pg['potongan'] ?></td>
                        <td><?= number_format($pg['jml_potongan'], 2, ',', '.') ?></td>
                        <td>
                            <a href="<?= base_url('/potongan-gaji/edit/' . $pg['id']) ?>" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="<?= base_url('/potongan-gaji/hapus/' . $pg['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                <i class="fas fa-trash"></i> Hapus
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center">Tidak ada data potongan gaji.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>