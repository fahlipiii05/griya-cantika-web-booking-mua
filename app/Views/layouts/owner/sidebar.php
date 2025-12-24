<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('owner/dashboard'); ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-crown"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Owner Panel</div>
    </a>

    <hr class="sidebar-divider my-0">

    <!-- Dashboard -->
    <li class="nav-item <?= (uri_string() == 'owner/dashboard') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('owner/dashboard'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">📊 Laporan & Statistik</div>

    <!-- Laporan Booking -->
    <li class="nav-item <?= (uri_string() == 'owner/laporan-booking') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('owner/laporan-booking'); ?>">
            <i class="fas fa-fw fa-calendar-check"></i>
            <span>Laporan Booking</span>
        </a>
    </li>

    <!-- Laporan Pendapatan -->
    <li class="nav-item <?= (uri_string() == 'owner/laporan-pendapatan') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('owner/laporan-pendapatan'); ?>">
            <i class="fas fa-fw fa-wallet"></i>
            <span>Laporan Pendapatan</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <!-- Keluar -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('/logout'); ?>">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </li>

</ul>
<!-- End of Sidebar -->
