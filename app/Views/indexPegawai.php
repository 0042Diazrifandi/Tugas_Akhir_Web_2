<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="container">
    <h1 class="my-4">Data Pegawai</h1>

    <!-- Statistik -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Total Karyawan
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalKaryawan ?></div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Total Admin
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalAdmin ?></div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                        Total Jabatan
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalJabatan ?></div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        Total Kehadiran
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalKehadiran ?></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel Data Pegawai -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Pegawai</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Jabatan</th>
                            <th>Status</th>
                            <th>Tanggal Masuk</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($pegawai)): ?>
                            <?php foreach ($pegawai as $index => $p): ?>
                                <tr>
                                    <td><?= $index + 1 ?></td>
                                    <td><?= $p['nik'] ?></td>
                                    <td><?= $p['nama_pegawai'] ?></td>
                                    <td><?= $p['jenis_kelamin'] ?></td>
                                    <td><?= $p['nama_jabatan'] ?></td>
                                    <td><?= $p['status'] ?></td>
                                    <td><?= $p['tanggal_masuk'] ?></td>
                                    <td>
                                        <a href="<?= base_url('pegawai/edit/' . $p['id_pegawai']) ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="<?= base_url('pegawai/delete/' . $p['id_pegawai']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="8" class="text-center">Tidak ada data pegawai.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
