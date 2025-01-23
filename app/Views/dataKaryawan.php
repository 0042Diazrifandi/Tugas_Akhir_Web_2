<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <a href="<?= site_url('pegawai/create') ?>" class="btn btn-primary mb-3">+ Tambah Pegawai</a>
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
                    <td><?= $p['nama_jabatan'] ?></td>
                    <td><?= $p['tanggal_masuk'] ?></td>
                    <td><?= $p['status'] ?></td>
                    <td>
                        <img src="<?= base_url('uploads/' . $p['photo']) ?>" alt="Photo" width="50">
                    </td>
                    <td><?= $p['hak_akses'] ?></td>
                    <td>
                        <a href="<?= site_url('pegawai/edit/' . $p['id_pegawai']) ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="<?= site_url('pegawai/delete/' . $p['id_pegawai']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>
