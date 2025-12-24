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
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">✏️ Edit Pembayaran</h1>
        <a href="<?= base_url('/admin/pembayaran') ?>" class="btn btn-secondary shadow-sm">
          <i class="icofont-arrow-left"></i> Kembali
        </a>
      </div>

      <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
      <?php endif; ?>

      <!-- Form Edit Pembayaran -->
      <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gradient-primary text-white">
          <h6 class="m-0 font-weight-bold">📝 Formulir Edit Pembayaran</h6>
        </div>

        <div class="card-body">
          <form action="<?= base_url('/admin/pembayaran/update/' . $payment['id']) ?>" method="post" class="needs-validation" novalidate>

            <!-- Nama Pelanggan -->
            <div class="mb-3">
              <label for="client_name" class="form-label fw-bold">Nama Pelanggan <span class="text-danger">*</span></label>
              <input type="text" name="client_name" id="client_name" class="form-control shadow-sm" value="<?= esc($payment['client_name']) ?>" required>
              <div class="invalid-feedback">Nama pelanggan wajib diisi.</div>
            </div>

            <!-- Pilih Layanan -->
            <div class="mb-3">
              <label for="service_id" class="form-label fw-bold">Layanan <span class="text-danger">*</span></label>
              <select name="service_id" id="service_id" class="form-select shadow-sm" required>
                <option value="">-- Pilih Layanan --</option>
                <?php if (!empty($services)): ?>
                  <?php foreach ($services as $s): ?>
                    <option value="<?= $s['id'] ?>" <?= ($s['id'] == $payment['service_id']) ? 'selected' : '' ?>>
                      <?= esc($s['nama']) ?>
                    </option>
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
              <input type="number" name="gross_amount" id="gross_amount" class="form-control shadow-sm" value="<?= esc($payment['gross_amount']) ?>" required>
              <div class="invalid-feedback">Jumlah pembayaran wajib diisi.</div>
            </div>

            <!-- Metode Pembayaran -->
            <div class="mb-3">
              <label for="payment_type" class="form-label fw-bold">Metode Pembayaran <span class="text-danger">*</span></label>
              <select name="payment_type" id="payment_type" class="form-select shadow-sm" required>
                <option value="">-- Pilih Metode --</option>
                <option value="transfer" <?= ($payment['payment_type'] == 'transfer') ? 'selected' : '' ?>>Transfer Bank</option>
                <option value="ewallet" <?= ($payment['payment_type'] == 'ewallet') ? 'selected' : '' ?>>E-Wallet</option>
                <option value="cash" <?= ($payment['payment_type'] == 'cash') ? 'selected' : '' ?>>Tunai</option>
              </select>
              <div class="invalid-feedback">Metode pembayaran wajib dipilih.</div>
            </div>

            <!-- Status Pembayaran -->
            <div class="mb-3">
              <label for="status" class="form-label fw-bold">Status Pembayaran <span class="text-danger">*</span></label>
              <select name="status" id="status" class="form-select shadow-sm" required>
                <option value="pending" <?= ($payment['status'] == 'pending') ? 'selected' : '' ?>>⏳ Pending</option>
                <option value="success" <?= ($payment['status'] == 'success') ? 'selected' : '' ?>>✅ Sukses</option>
                <option value="failed" <?= ($payment['status'] == 'failed') ? 'selected' : '' ?>>❌ Gagal</option>
              </select>
              <div class="invalid-feedback">Status pembayaran wajib dipilih.</div>
            </div>

            <!-- Tanggal Pembayaran -->
            <div class="mb-4">
              <label for="payment_time" class="form-label fw-bold">Tanggal & Waktu Pembayaran <span class="text-danger">*</span></label>
              <input type="datetime-local" name="payment_time" id="payment_time" class="form-control shadow-sm" 
                     value="<?= date('Y-m-d\TH:i', strtotime($payment['payment_time'])) ?>" required>
              <div class="invalid-feedback">Tanggal pembayaran wajib diisi.</div>
            </div>

            <!-- Tombol Simpan -->
            <div class="d-flex justify-content-end">
              <button type="submit" class="btn btn-warning px-4 shadow-sm">
                <i class="icofont-save"></i> Perbarui Pembayaran
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
