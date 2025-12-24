<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin/dashboard'); ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin MUA</div>
    </a>

    <hr class="sidebar-divider my-0">

    <!-- Dashboard -->
    <li class="nav-item <?= (uri_string() == 'admin/dashboard') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('admin/dashboard'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">Manajemen</div>

    <!-- User -->
    <li class="nav-item <?= (uri_string() == 'admin/user') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('admin/user'); ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>User</span>
        </a>
    </li>

    <!-- Pesanan -->
    <li class="nav-item <?= (uri_string() == 'admin/booking') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('admin/booking'); ?>">
            <i class="fas fa-fw fa-shopping-cart"></i>
            <span>Pesanan</span>
        </a>
    </li>

    <!-- Layanan -->
    <li class="nav-item <?= (uri_string() == 'admin/layanan') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('admin/layanan'); ?>">
            <i class="fas fa-fw fa-magic"></i>
            <span>Layanan</span>
        </a>
    </li>

    <!-- Portfolio -->
    <li class="nav-item <?= (uri_string() == 'admin/portfolio') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('admin/portfolio'); ?>">
            <i class="fas fa-fw fa-camera"></i>
            <span>Portfolio</span>
        </a>
    </li>
    
    <!-- Pembayaran -->
    <li class="nav-item <?= (uri_string() == 'admin/pembayaran') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('admin/pembayaran'); ?>">
            <i class="fas fa-fw fa-credit-card"></i>
            <span>Pembayaran</span>
        </a>
    </li>

    <!-- Kontak -->
    <li class="nav-item <?= (uri_string() == 'admin/kontak') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('admin/kontak'); ?>">
            <i class="fas fa-fw fa-phone"></i>
            <span>Kontak</span>
        </a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">
</ul>
<!-- End of Sidebar -->
