<?= $this->include('layouts/admin/header') ?>
<?= $this->include('layouts/admin/sidebar') ?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">
    <?= $this->include('layouts/admin/topbar') ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Detail Pembayaran</h1>
        <a href="<?= base_url('admin/pembayaran') ?>" class="btn btn-secondary btn-sm shadow-sm">
          <i class="fas fa-arrow-left"></i> Kembali
        </a>
      </div>

      <!-- Detail Card -->
      <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gradient-primary text-white">
          <h6 class="m-0 font-weight-bold">💳 Informasi Pembayaran</h6>
        </div>

        <div class="card-body">
          <dl class="row mb-0">

            <!-- Detail Klien -->
            <dt class="col-sm-3">Nama Client</dt>
            <dd class="col-sm-9"><?= esc($payment['client_name']); ?></dd>

            <dt class="col-sm-3">Layanan</dt>
            <dd class="col-sm-9"><?= esc($payment['service_name'] ?? 'Tidak Diketahui'); ?></dd>

            <dt class="col-sm-3">Order ID</dt>
            <dd class="col-sm-9"><?= esc($payment['order_id']); ?></dd>

            <dt class="col-sm-3">Transaction ID</dt>
            <dd class="col-sm-9"><?= esc($payment['transaction_id']); ?></dd>

            <dt class="col-sm-3">Metode Pembayaran</dt>
            <dd class="col-sm-9"><?= esc($payment['payment_type'] ?? '-'); ?></dd>

            <dt class="col-sm-3">Total Pembayaran</dt>
            <dd class="col-sm-9"><strong>Rp <?= number_format($payment['gross_amount'], 0, ',', '.'); ?></strong></dd>

            <dt class="col-sm-3">Status Pembayaran</dt>
            <dd class="col-sm-9">
              <?php if ($payment['status'] === 'success'): ?>
                <span class="badge bg-success px-3 py-2">✅ Sukses</span>
              <?php elseif ($payment['status'] === 'pending'): ?>
                <span class="badge bg-warning text-dark px-3 py-2">⏳ Pending</span>
              <?php elseif ($payment['status'] === 'failed'): ?>
                <span class="badge bg-danger px-3 py-2">❌ Gagal</span>
              <?php else: ?>
                <span class="badge bg-secondary px-3 py-2"><?= ucfirst(esc($payment['status'])) ?></span>
              <?php endif; ?>
            </dd>

            <dt class="col-sm-3">Tanggal Pembayaran</dt>
            <dd class="col-sm-9"><?= date('d-m-Y H:i', strtotime($payment['payment_time'])); ?></dd>

          </dl>
        </div>
      </div>

      <!-- Tombol Aksi -->
      <div class="d-flex justify-content-end mt-3">
        <a href="<?= base_url('admin/pembayaran') ?>" class="btn btn-secondary me-2 shadow-sm">
          <i class="fas fa-arrow-left"></i> Kembali
        </a>
        <a href="<?= base_url('admin/pembayaran/invoice/' . $payment['id']) ?>" 
           class="btn btn-primary shadow-sm" target="_blank">
          <i class="fas fa-file-invoice"></i> Cetak Invoice
        </a>
      </div>

    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- End of Main Content -->

  <?= $this->include('layouts/admin/footer') ?>
</div>
<!-- End of Content Wrapper -->
