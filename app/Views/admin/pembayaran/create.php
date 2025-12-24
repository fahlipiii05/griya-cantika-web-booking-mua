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
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">💳 Tambah Pembayaran Baru</h1>
        <a href="<?= base_url('/admin/pembayaran') ?>" class="btn btn-secondary shadow-sm">
          <i class="icofont-arrow-left"></i> Kembali
        </a>
      </div>

      <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
      <?php endif; ?>

      <!-- Form Tambah Pembayaran -->
      <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gradient-primary text-white">
          <h6 class="m-0 font-weight-bold">📝 Formulir Pembayaran</h6>
        </div>

        <div class="card-body">
          <form action="<?= base_url('/admin/pembayaran/store') ?>" method="post" class="needs-validation" novalidate>

            <!-- Pilih Booking -->
            <div class="mb-3">
              <label for="booking_id" class="form-label fw-bold">Pilih Booking <span class="text-danger">*</span></label>
              <select name="booking_id" id="booking_id" class="form-select shadow-sm" required>
                <option value="">-- Pilih Booking --</option>
                <?php if (!empty($bookings)): ?>
                  <?php foreach ($bookings as $b): ?>
                    <option value="<?= $b['id'] ?>"><?= esc($b['client_name']) ?> (ID: <?= $b['id'] ?>)</option>
                  <?php endforeach; ?>
                <?php else: ?>
                  <option disabled>Tidak ada data booking</option>
                <?php endif; ?>
              </select>
              <div class="invalid-feedback">Silakan pilih booking.</div>
            </div>

            <!-- Pilih Layanan -->
            <div class="mb-3">
              <label for="service_id" class="form-label fw-bold">Layanan <span class="text-danger">*</span></label>
              <select name="service_id" id="service_id" class="form-select shadow-sm" required>
                <option value="">-- Pilih Layanan --</option>
                <?php if (!empty($services)): ?>
                  <?php foreach ($services as $s): ?>
                    <option value="<?= $s['id'] ?>"><?= esc($s['nama']) ?></option>
                  <?php endforeach; ?>
                <?php else: ?>
                  <option disabled>Tidak ada layanan tersedia</option>
                <?php endif; ?>
              </select>
              <div class="invalid-feedback">Silakan pilih layanan.</div>
            </div>

            <!-- Jumlah Pembayaran -->
            <div class="mb-3">
              <label for="gross_amount" class="form-label fw-bold">Jumlah Pembayaran (Rp) <span class="text-danger">*</span></label>
              <input type="number" name="gross_amount" id="gross_amount" class="form-control shadow-sm" placeholder="Contoh: 500000" required>
              <div class="invalid-feedback">Jumlah pembayaran wajib diisi.</div>
            </div>

            <!-- Metode Pembayaran -->
            <div class="mb-3">
              <label for="payment_type" class="form-label fw-bold">Metode Pembayaran <span class="text-danger">*</span></label>
              <select name="payment_type" id="payment_type" class="form-select shadow-sm" required>
                <option value="">-- Pilih Metode --</option>
                <option value="transfer">Transfer Bank</option>
                <option value="ewallet">E-Wallet</option>
                <option value="cash">Tunai</option>
              </select>
              <div class="invalid-feedback">Metode pembayaran wajib dipilih.</div>
            </div>

            <!-- Status Pembayaran -->
            <div class="mb-3">
              <label for="status" class="form-label fw-bold">Status Pembayaran <span class="text-danger">*</span></label>
              <select name="status" id="status" class="form-select shadow-sm" required>
                <option value="pending">⏳ Pending</option>
                <option value="success">✅ Sukses</option>
                <option value="failed">❌ Gagal</option>
              </select>
              <div class="invalid-feedback">Status pembayaran wajib dipilih.</div>
            </div>

            <!-- Tanggal Pembayaran -->
            <div class="mb-4">
              <label for="payment_time" class="form-label fw-bold">Tanggal & Waktu Pembayaran <span class="text-danger">*</span></label>
              <input type="datetime-local" name="payment_time" id="payment_time" class="form-control shadow-sm" required>
              <div class="invalid-feedback">Tanggal pembayaran wajib diisi.</div>
            </div>

            <!-- Tombol Simpan -->
            <div class="d-flex justify-content-end">
              <button type="submit" class="btn btn-success px-4 shadow-sm">
                <i class="icofont-save"></i> Simpan Pembayaran
              </button>
            </div>
          </form>
        </div>
      </div>

    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- End of Main Content -->

  <?= $this->include('layouts/admin/footer') ?>
</div>
<!-- End of Content Wrapper -->

<script>
  // ✅ Bootstrap Validation
  (() => {
    'use strict'
    const forms = document.querySelectorAll('.needs-validation')
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }
        form.classList.add('was-validated')
      }, false)
    })
  })()
</script>
