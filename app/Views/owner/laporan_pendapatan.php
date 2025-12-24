<?= $this->include('layouts/owner/header') ?>
<?= $this->include('layouts/owner/sidebar') ?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">
    <?= $this->include('layouts/owner/topbar') ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><i class="fas "></i>Laporan Pendapatan</h1>
        <a href="<?= base_url('owner/dashboard') ?>" class="btn btn-secondary shadow-sm">
          <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
        </a>
      </div>

      <!-- Filter Pencarian -->
      <div class="card shadow-sm mb-4">
        <div class="card-header bg-gradient-primary text-white">
          <i class="fas fa-filter"></i> Filter Pendapatan
        </div>
        <div class="card-body">
          <form method="get" class="row g-3 align-items-end">
            <div class="col-md-4">
              <label class="form-label fw-semibold">Dari Tanggal</label>
              <input type="date" name="start_date" class="form-control" value="<?= esc($start_date) ?>">
            </div>
            <div class="col-md-4">
              <label class="form-label fw-semibold">Sampai Tanggal</label>
              <input type="date" name="end_date" class="form-control" value="<?= esc($end_date) ?>">
            </div>
            <div class="col-md-4">
              <button class="btn btn-primary w-100"><i class="fas fa-search"></i> Tampilkan</button>
            </div>
          </form>
        </div>
      </div>

      <!-- Total Pendapatan -->
      <div class="card shadow-sm mb-4 text-center border-left-primary">
        <div class="card-body py-4">
          <h4 class="fw-semibold text-dark mb-2"><i class="fas fa-wallet"></i> Total Pendapatan</h4>
          <h2 class="fw-bold text-primary">Rp <?= number_format($total ?? 0, 0, ',', '.') ?></h2>
        </div>
      </div>

      <!-- Tabel Pembayaran -->
      <div class="card shadow mb-4">
        <div class="card-header bg-gradient-primary text-white d-flex justify-content-between align-items-center">
          <h6 class="m-0 font-weight-bold"><i class="fas fa-list"></i> 📋 Data Pembayaran</h6>
          <a href="<?= base_url('owner/laporan-pendapatan/export?start_date=' . $start_date . '&end_date=' . $end_date) ?>" 
         class="btn btn-danger btn-sm shadow-sm" target="_blank">
        <i class="fas fa-file-pdf"></i> Export PDF
        </a>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle text-center">
              <thead class="table-dark">
                <tr>
                  <th>#</th>
                  <th>Nama Klien</th>
                  <th>Layanan</th>
                  <th>Tanggal Pembayaran</th>
                  <th>Metode</th>
                  <th>Total</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($pembayaran)): ?>
                  <?php $no=1; foreach($pembayaran as $p): ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td class="fw-semibold"><?= esc($p['client_name']) ?></td>
                      <td><?= esc($p['service_id']) ?></td>
                      <td><?= date('d M Y H:i', strtotime($p['payment_time'])) ?></td>
                      <td>
                        <span class="badge bg-info text-dark px-3 py-2">
                          <i class="fas fa-credit-card"></i> <?= ucfirst($p['payment_type']) ?>
                        </span>
                      </td>
                      <td class="fw-bold text-success">Rp <?= number_format($p['gross_amount'], 0, ',', '.') ?></td>
                      <td>
                        <?php if ($p['status'] === 'success'): ?>
                          <span class="badge bg-success px-3 py-2"><i class="fas fa-check-circle"></i> Lunas</span>
                        <?php else: ?>
                          <span class="badge bg-warning px-3 py-2 text-dark"><i class="fas fa-clock"></i> Pending</span>
                        <?php endif; ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php else: ?>
                  <tr>
                    <td colspan="7" class="text-center text-muted py-4">
                      <i class="icofont-warning"></i> Tidak ada data pembayaran untuk periode ini.
                    </td>
                  </tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- End of Main Content -->

  <?= $this->include('layouts/owner/footer') ?>
</div>
<!-- End of Content Wrapper -->
