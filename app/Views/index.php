<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="row">
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

<?= $this->endSection() ?>
