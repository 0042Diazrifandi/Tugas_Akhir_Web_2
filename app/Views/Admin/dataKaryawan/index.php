<?= $this->extend('Admin/layout/main') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <a href="<?= base_url('Admin/karyawan/create') ?>" class="btn btn-primary mb-3">+ Tambah Pegawai</a>
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
            <?php $no = 1;
            foreach ($karyawan as $p): ?>
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
                        <!-- Edit Button -->
                        <a href="<?= base_url('Admin/karyawan/edit/' . $p['id_pegawai']) ?>" class="btn btn-sm btn-warning">Edit</a>

                        <!-- Delete Button with Confirmation -->
                        <a href="<?= base_url('Admin/karyawan/delete/' . $p['id_pegawai']) ?>" class="btn btn-sm btn-danger"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>