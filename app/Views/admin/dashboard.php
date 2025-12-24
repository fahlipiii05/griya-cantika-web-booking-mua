<?= $this->include('layouts/admin/header') ?>
<?= $this->include('layouts/admin/sidebar') ?>

<div id="content-wrapper" class="d-flex flex-column">

  <div id="content">
    <?= $this->include('layouts/admin/topbar') ?>

    <div class="container-fluid">

      <!-- Judul Halaman -->
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800 fw-bold"><i class="fas fa-chart-line"></i> Dashboard Admin</h1>
        <a href="<?= base_url('admin/booking') ?>" class="btn btn-primary shadow-sm">
          <i class="fas fa-calendar-check"></i> Kelola Pesanan
        </a>
      </div>

      <!-- Statistik Utama -->
      <div class="row text-center">

        <!-- Total Pesanan -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-success shadow-sm h-100 py-3">
            <div class="card-body">
              <div class="mb-2 text-success"><i class="fas fa-shopping-cart fa-2x"></i></div>
              <div class="text-xs text-uppercase text-muted fw-bold mb-1">Total Pesanan</div>
              <div class="h3 fw-bold text-dark"><?= number_format($total_pesanan ?? 120, 0, ',', '.') ?></div>
            </div>
          </div>
        </div>

        <!-- Total Layanan -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-info shadow-sm h-100 py-3">
            <div class="card-body">
              <div class="mb-2 text-info"><i class="fas fa-magic fa-2x"></i></div>
              <div class="text-xs text-uppercase text-muted fw-bold mb-1">Total Layanan</div>
              <div class="h3 fw-bold text-dark"><?= number_format($total_layanan ?? 5, 0, ',', '.') ?></div>
            </div>
          </div>
        </div>

        <!-- Total Portfolio -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-warning shadow-sm h-100 py-3">
            <div class="card-body">
              <div class="mb-2 text-warning"><i class="fas fa-camera fa-2x"></i></div>
              <div class="text-xs text-uppercase text-muted fw-bold mb-1">Total Portfolio</div>
              <div class="h3 fw-bold text-dark"><?= number_format($total_portfolio ?? 58, 0, ',', '.') ?></div>
            </div>
          </div>
        </div>

        <!-- Total Pembayaran -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-primary shadow-sm h-100 py-3">
            <div class="card-body">
              <div class="mb-2 text-primary"><i class="fas fa-credit-card fa-2x"></i></div>
              <div class="text-xs text-uppercase text-muted fw-bold mb-1">Total Pembayaran</div>
              <div class="h4 fw-bold text-dark">Rp <?= number_format($total_pembayaran ?? 24500000, 0, ',', '.') ?></div>
            </div>
          </div>
        </div>

      </div>

      <!-- Ringkasan Data -->
      <div class="row mt-4">

        <!-- 📦 Ringkasan Pesanan -->
        <div class="col-lg-6 mb-4">
          <div class="card shadow-sm">
            <div class="card-header bg-gradient-success text-white">
              <i class="fas fa-receipt"></i> Ringkasan Pesanan
            </div>
            <div class="card-body">
              <p><i class="fas fa-clock text-warning"></i> Pesanan Diproses: <strong><?= esc($pesanan_proses ?? '18') ?></strong></p>
              <p><i class="fas fa-check-circle text-success"></i> Pesanan Selesai: <strong><?= esc($pesanan_selesai ?? '95') ?></strong></p>
              <p><i class="fas fa-times-circle text-danger"></i> Dibatalkan: <strong><?= esc($pesanan_batal ?? '7') ?></strong></p>
              <a href="<?= base_url('admin/booking') ?>" class="btn btn-sm btn-success mt-2">Lihat Semua Pesanan</a>
            </div>
          </div>
        </div>

        <!-- 💄 Layanan & Portfolio -->
        <div class="col-lg-6 mb-4">
          <div class="card shadow-sm">
            <div class="card-header bg-gradient-info text-white">
              <i class="fas fa-magic"></i> Statistik Layanan & Portfolio
            </div>
            <div class="card-body">
              <p><i class="fas fa-star text-warning"></i> Layanan Terpopuler: <strong>Wedding Makeup</strong></p>
              <p><i class="fas fa-users text-primary"></i> Pengguna Memilih Layanan: <strong>340+</strong></p>
              <p><i class="fas fa-image text-info"></i> Portfolio Terbaru: <strong><?= esc($portfolio_terbaru ?? '5') ?> foto</strong></p>
              <a href="<?= base_url('admin/layanan') ?>" class="btn btn-sm btn-info mt-2">Kelola Layanan</a>
            </div>
          </div>
        </div>

      </div>

      <!-- 💳 Status Pembayaran -->
      <div class="row">
        <div class="col-lg-12">
          <div class="card shadow-sm">
            <div class="card-header bg-gradient-primary text-white">
              <i class="fas fa-credit-card"></i> Status Pembayaran Terbaru
            </div>
            <div class="card-body">
              <table class="table table-striped table-hover text-center align-middle">
                <thead class="table-primary">
                  <tr>
                    <th>#</th>
                    <th>ID Pesanan</th>
                    <th>Nama User</th>
                    <th>Jumlah</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>#ORD1023</td>
                    <td>Hijar Fahlipi</td>
                    <td>Rp 450.000</td>
                    <td><span class="badge bg-success">Lunas</span></td>
                    <td>10 Okt 2025</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>#ORD1024</td>
                    <td>Rina Oktavia</td>
                    <td>Rp 800.000</td>
                    <td><span class="badge bg-warning">Pending</span></td>
                    <td>11 Okt 2025</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>#ORD1025</td>
                    <td>Andi Saputra</td>
                    <td>Rp 1.200.000</td>
                    <td><span class="badge bg-danger">Gagal</span></td>
                    <td>11 Okt 2025</td>
                  </tr>
                </tbody>
              </table>
              <a href="<?= base_url('admin/pembayaran') ?>" class="btn btn-sm btn-primary mt-2">Lihat Semua Pembayaran</a>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <?= $this->include('layouts/admin/footer') ?>
</div>
