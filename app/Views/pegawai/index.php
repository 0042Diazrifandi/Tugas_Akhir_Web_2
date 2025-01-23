<?= $this->extend('layout/sidebar') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <a href="<?= base_url('pegawai/create') ?>" class="btn btn-primary mb-3">+ Tambah Pegawai</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Jenis Kelamin</th>
                <th>Jabatan</th>
                <th>Tanggal Masuk</th>
                <th>Status</th>
                <th>Photo</th>
                <th>Hak Akses</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach ($pegawai as $p): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $p['nik'] ?></td>
                    <td><?= $p['nama_pegawai'] ?></td>
                    <td><?= $p['username'] ?></td>
                    <td><?= $p['jenis_kelamin'] ?></td>
                    <td><?= $p['nama_jabatan'] ?? 'No Jabatan' ?></td> <!-- Fallback untuk data jabatan -->
                    <td><?= $p['tanggal_masuk'] ?></td>
                    <td><?= $p['status'] ?></td>
                    <td>
                        <img src="<?= base_url('uploads/' . $p['photo']) ?>" alt="Photo" width="50">
                    </td>
                    <td><?= $p['hak_akses'] ?></td>
                    <td>
                        <a href="#" class="btn btn-sm btn-warning">Edit</a>
                        <a href="#" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>
