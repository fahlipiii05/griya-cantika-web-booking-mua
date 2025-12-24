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
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><i></i> Laporan Booking</h1>
        <a href="<?= base_url('owner/dashboard') ?>" class="btn btn-secondary shadow-sm">
          <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
        </a>
      </div>

      <!-- Filter Pencarian -->
      <div class="card shadow-sm mb-4">
        <div class="card-header bg-gradient-primary text-white">
          <i class="fas fa-filter"></i> Filter Laporan
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

      <!-- Laporan Tabel -->
      <div class="card shadow mb-4">
        <div class="card-header bg-gradient-primary text-white d-flex justify-content-between align-items-center">
          <h6 class="m-0 font-weight-bold"><i class="fas fa-list"></i> 📋 Data Booking</h6>
          <a href="<?= base_url('owner/laporan-booking/export?start_date=' . ($start_date ?? '') . '&end_date=' . ($end_date ?? '')) ?>" 
   class="btn btn-light btn-sm shadow-sm" target="_blank">
  <i class="fas fa-file-pdf text-danger"></i> Export PDF
</a>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle text-center">
              <thead class="table-dark">
                <tr>
                  <th>#</th>
                  <th>Nama Klien</th>
                  <th>Email</th>
                  <th>Tanggal</th>
                  <th>Jam</th>
                  <th>Layanan</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($bookings)): ?>
                  <?php $no = 1; foreach ($bookings as $b): ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td class="fw-bold"><?= esc($b['client_name']) ?></td>
                      <td><?= esc($b['email']) ?></td>
                      <td><?= date('d M Y', strtotime($b['date'])) ?></td>
                      <td><?= date('H:i', strtotime($b['time'])) ?></td>
                      <td><?= esc($b['service_id']) ?></td>
                      <td>
                        <?php if ($b['status'] == 'paid'): ?>
                          <span class="badge bg-success px-3 py-2"><i class="fas fa-check-circle"></i> Lunas</span>
                        <?php elseif ($b['status'] == 'pending'): ?>
                          <span class="badge bg-warning px-3 py-2 text-dark"><i class="fas fa-clock"></i> Pending</span>
                        <?php else: ?>
                          <span class="badge bg-secondary px-3 py-2"><i class="fas fa-hourglass-half"></i> <?= ucfirst($b['status']) ?></span>
                        <?php endif; ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php else: ?>
                  <tr>
                    <td colspan="7" class="text-center text-muted py-4">
                      <i class="icofont-warning"></i> Tidak ada data booking untuk periode ini.
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
