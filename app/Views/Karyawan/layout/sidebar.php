<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">PENGGAJIAN</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('Karyawan/dashboard');?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Data Karyawan (Admin Only) -->
    <?php if (session()->get('hak_akses') == 'admin'): ?>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('pegawai') ?>">
                <i class="fas fa-fw fa-users"></i>
                <span>Data Karyawan</span>
            </a>
        </li>
    <?php endif; ?>

    <!-- Data Gaji (Admin & Karyawan) -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Karyawan/data-gaji') ?>">
            <i class="fas fa-fw fa-money-bill-wave"></i>
            <span>Data Gaji</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Karyawan/data-absensi') ?>">
            <i class="fas fa-fw fa-calendar-check"></i> <!-- Icon yang lebih sesuai untuk Absensi -->
            <span>Data Absensi</span>
        </a>
    </li>



    <!-- Logout -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('logout') ?>">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </li>
</ul>