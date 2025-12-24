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
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">✏️ Edit Booking</h1>
        <a href="<?= base_url('/admin/booking') ?>" class="btn btn-secondary shadow-sm">
          <i class="icofont-arrow-left"></i> Kembali
        </a>
      </div>

      <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
      <?php endif; ?>

      <!-- Form Edit Booking -->
      <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gradient-warning text-white">
          <h6 class="m-0 font-weight-bold">📝 Formulir Edit Booking</h6>
        </div>

        <div class="card-body">
          <form action="<?= base_url('/admin/booking/update/' . $booking['id']) ?>" method="post" class="needs-validation" novalidate>
            
            <!-- Nama Pelanggan -->
            <div class="mb-3">
              <label for="client_name" class="form-label fw-bold">Nama Pelanggan <span class="text-danger">*</span></label>
              <input type="text" name="client_name" id="client_name" class="form-control shadow-sm" 
                     value="<?= esc($booking['client_name']) ?>" required>
              <div class="invalid-feedback">Nama pelanggan wajib diisi.</div>
            </div>

            <!-- Email -->
            <div class="mb-3">
              <label for="email" class="form-label fw-bold">Email <span class="text-danger">*</span></label>
              <input type="email" name="email" id="email" class="form-control shadow-sm" 
                     value="<?= esc($booking['email']) ?>" required>
              <div class="invalid-feedback">Email wajib diisi.</div>
            </div>

            <!-- Nomor Telepon -->
            <div class="mb-3">
              <label for="phone" class="form-label fw-bold">Nomor Telepon <span class="text-danger">*</span></label>
              <input type="text" name="phone" id="phone" class="form-control shadow-sm" 
                     value="<?= esc($booking['phone']) ?>" required>
              <div class="invalid-feedback">Nomor telepon wajib diisi.</div>
            </div>

            <!-- Alamat -->
            <div class="mb-3">
              <label for="address" class="form-label fw-bold">Alamat <span class="text-danger">*</span></label>
              <textarea name="address" id="address" rows="4" class="form-control shadow-sm" required><?= esc($booking['address']) ?></textarea>
              <div class="invalid-feedback">Alamat tidak boleh kosong.</div>
            </div>

            <!-- Tanggal Booking -->
            <div class="mb-3">
              <label for="date" class="form-label fw-bold">Tanggal Booking <span class="text-danger">*</span></label>
              <input type="date" name="date" id="date" class="form-control shadow-sm" 
                     value="<?= esc($booking['date']) ?>" required>
              <div class="invalid-feedback">Tanggal booking wajib diisi.</div>
            </div>

            <!-- Waktu Booking -->
            <div class="mb-3">
              <label for="time" class="form-label fw-bold">Waktu Booking <span class="text-danger">*</span></label>
              <input type="time" name="time" id="time" class="form-control shadow-sm" 
                     value="<?= esc($booking['time']) ?>" required>
              <div class="invalid-feedback">Waktu booking wajib diisi.</div>
            </div>

            <!-- Layanan -->
            <div class="mb-3">
              <label for="service_id" class="form-label fw-bold">Layanan <span class="text-danger">*</span></label>
              <select name="service_id" id="service_id" class="form-select shadow-sm" required>
                <option value="">-- Pilih Layanan --</option>
                <?php if (isset($services) && !empty($services)): ?>
                  <?php foreach ($services as $s): ?>
                    <option value="<?= $s['id'] ?>" <?= $s['id'] == $booking['service_id'] ? 'selected' : '' ?>>
                      <?= esc($s['nama']) ?>
                    </option>
                  <?php endforeach; ?>
                <?php else: ?>
                  <option disabled>Tidak ada layanan tersedia</option>
                <?php endif; ?>
              </select>
              <div class="invalid-feedback">Pilih layanan terlebih dahulu.</div>
            </div>

            <!-- Status -->
            <div class="mb-3">
              <label for="status" class="form-label fw-bold">Status Booking <span class="text-danger">*</span></label>
              <select name="status" id="status" class="form-select shadow-sm" required>
                <option value="pending" <?= $booking['status'] == 'pending' ? 'selected' : '' ?>>Pending</option>
                <option value="confirmed" <?= $booking['status'] == 'confirmed' ? 'selected' : '' ?>>Dikonfirmasi</option>
                <option value="rejected" <?= $booking['status'] == 'rejected' ? 'selected' : '' ?>>Ditolak</option>
              </select>
              <div class="invalid-feedback">Status wajib dipilih.</div>
            </div>

            <!-- Tombol Simpan -->
            <div class="d-flex justify-content-end">
              <button type="submit" class="btn btn-warning px-4 shadow-sm">
                <i class="icofont-save"></i> Perbarui Booking
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
