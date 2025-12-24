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
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Detail Booking</h1>
        <a href="<?= base_url('admin/booking') ?>" class="btn btn-secondary btn-sm">
          <i class="fas fa-arrow-left"></i> Kembali
        </a>
      </div>

      <!-- Detail Card -->
      <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gradient-primary text-white">
          <h6 class="m-0 font-weight-bold">📋 Informasi Booking</h6>
        </div>

        <div class="card-body">
          <dl class="row mb-0">
            <dt class="col-sm-3">Nama Pelanggan</dt>
            <dd class="col-sm-9"><?= esc($order['client_name']); ?></dd>

            <dt class="col-sm-3">Alamat</dt>
            <dd class="col-sm-9"><?= esc($order['address']); ?></dd>

            <dt class="col-sm-3">Email</dt>
            <dd class="col-sm-9"><?= esc($order['email']); ?></dd>

            <dt class="col-sm-3">Nomor Telepon</dt>
            <dd class="col-sm-9"><?= esc($order['phone']); ?></dd>

            <dt class="col-sm-3">Tanggal Booking</dt>
            <dd class="col-sm-9"><?= date('d-m-Y', strtotime($order['date'])); ?></dd>

            <dt class="col-sm-3">Jam</dt>
            <dd class="col-sm-9"><?= esc($order['time']); ?></dd>

            <dt class="col-sm-3">Layanan</dt>
            <dd class="col-sm-9"><?= esc($order['service_id']); ?></dd>

            <dt class="col-sm-3">Status</dt>
            <dd class="col-sm-9">
              <?php if ($order['status'] == 'pending'): ?>
                <span class="badge bg-warning text-dark px-3 py-2">Pending</span>
              <?php elseif ($order['status'] == 'confirmed'): ?>
                <span class="badge bg-success px-3 py-2">Dikonfirmasi</span>
              <?php else: ?>
                <span class="badge bg-danger px-3 py-2">Ditolak</span>
              <?php endif; ?>
            </dd>
          </dl>
        </div>
      </div>

    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- End of Main Content -->

  <?= $this->include('layouts/admin/footer') ?>
</div>
<!-- End of Content Wrapper -->
