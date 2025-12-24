<?= $this->include('layouts/owner/header') ?>
<?= $this->include('layouts/owner/sidebar') ?>

<div id="content-wrapper" class="d-flex flex-column">

  <div id="content">
    <?= $this->include('layouts/owner/topbar') ?>

    <div class="container-fluid">

      <!-- Judul Halaman -->
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800 fw-bold"><i class="fas fa-chart-line"></i> Dashboard Owner</h1>
        <a href="<?= base_url('owner/laporan-booking') ?>" class="btn btn-primary shadow-sm">
          <i class="fas fa-file-alt"></i> Lihat Laporan
        </a>
      </div>

      <!-- Statistik Utama -->
      <div class="row text-center">

        <!-- Total Booking -->
        <div class="col-xl-4 col-md-6 mb-4">
          <div class="card border-left-primary shadow-sm h-100 py-3">
            <div class="card-body">
              <div class="mb-2 text-primary"><i class="fas fa-calendar-check fa-2x"></i></div>
              <div class="text-xs text-uppercase text-muted fw-bold mb-1">Total Booking</div>
              <div class="h3 fw-bold text-dark"><?= number_format($totalBookings ?? 0, 0, ',', '.') ?></div>
            </div>
          </div>
        </div>

        <!-- Total Pendapatan -->
        <div class="col-xl-4 col-md-6 mb-4">
          <div class="card border-left-success shadow-sm h-100 py-3">
            <div class="card-body">
              <div class="mb-2 text-success"><i class="fas fa-money-bill-wave fa-2x"></i></div>
              <div class="text-xs text-uppercase text-muted fw-bold mb-1">Total Pendapatan</div>
              <div class="h4 fw-bold text-dark">Rp <?= number_format($totalPendapatan ?? 0, 0, ',', '.') ?></div>
            </div>
          </div>
        </div>

        <!-- Total Pengguna -->
        <div class="col-xl-4 col-md-6 mb-4">
          <div class="card border-left-warning shadow-sm h-100 py-3">
            <div class="card-body">
              <div class="mb-2 text-warning"><i class="fas fa-users fa-2x"></i></div>
              <div class="text-xs text-uppercase text-muted fw-bold mb-1">Total Pengguna</div>
              <div class="h3 fw-bold text-dark"><?= number_format($totalUsers ?? 0, 0, ',', '.') ?></div>
            </div>
          </div>
        </div>

      </div>

      <!-- Grafik Pendapatan -->
      <div class="row mt-4">
        <div class="col-lg-12 mb-4">
          <div class="card shadow-sm">
            <div class="card-header bg-gradient-primary text-white">
              <i class="fas fa-chart-bar"></i> Grafik Pendapatan Bulanan
            </div>
            <div class="card-body">
              <canvas id="grafikPendapatan"></canvas>
            </div>
          </div>
        </div>
      </div>

      <!-- Ringkasan Booking & Pembayaran -->
      <div class="row">

      </div>

    </div>
  </div>

  <?= $this->include('layouts/owner/footer') ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('grafikPendapatan');
new Chart(ctx, {
  type: 'bar',
  data: {
    labels: <?= json_encode(array_map(fn($g) => $g['bulan'], $grafikPendapatan)) ?>,
    datasets: [{
      label: 'Total Pendapatan',
      data: <?= json_encode(array_map(fn($g) => $g['total'], $grafikPendapatan)) ?>,
      backgroundColor: '#ff4d6d',
      borderRadius: 6
    }]
  },
  options: {
    responsive: true,
    plugins: { legend: { display: false } },
    scales: { y: { beginAtZero: true } }
  }
});
</script>
