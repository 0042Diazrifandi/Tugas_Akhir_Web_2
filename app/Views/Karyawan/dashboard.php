<?= $this->extend('Karyawan/layout/main') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

    <!-- Card untuk Data Pegawai Login -->
    <div class="row">
        <div class="col-lg-4">
            <div class="card shadow">
                <div class="card-header text-primary">
                    Informasi Pegawai
                </div>
                <div class="card-body">
                    <?php if (isset($pegawai)): ?>
                        <p><strong>Nama:</strong> <?= esc($pegawai['nama_pegawai']) ?></p>
                        <p><strong>NIK:</strong> <?= esc($pegawai['nik']) ?></p>
                        <p><strong>Jabatan:</strong> <?= esc($pegawai['nama_jabatan']) ?></p>

                        <p><strong>Status:</strong> <?= esc(ucfirst($pegawai['status'])) ?></p>
                    <?php else: ?>
                        <p>Informasi pegawai tidak tersedia.</p>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection() ?>