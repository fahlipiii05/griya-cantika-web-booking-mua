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
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"> Edit Layanan</h1>
        <a href="<?= base_url('/admin/layanan') ?>" class="btn btn-secondary shadow-sm">
          <i class="icofont-arrow-left"></i> Kembali
        </a>
      </div>

      <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error'); ?></div>
      <?php endif; ?>

      <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gradient-primary text-white">
          <h6 class="m-0 font-weight-bold">📝 Formulir Edit Layanan</h6>
        </div>

        <div class="card-body">
          <form action="<?= base_url('/admin/layanan/update/' . $layanan['id']) ?>" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>

            <!-- Nama -->
            <div class="mb-3">
              <label for="nama" class="form-label fw-bold">Nama Layanan <span class="text-danger">*</span></label>
              <input type="text" class="form-control shadow-sm" id="nama" name="nama" value="<?= esc($layanan['nama']) ?>" required>
              <div class="invalid-feedback">Nama layanan wajib diisi.</div>
            </div>

            <!-- Deskripsi -->
            <div class="mb-3">
              <label for="deskripsi" class="form-label fw-bold">Deskripsi <span class="text-danger">*</span></label>
              <textarea class="form-control shadow-sm" id="deskripsi" name="deskripsi" rows="5" required><?= esc($layanan['deskripsi']) ?></textarea>
              <div class="invalid-feedback">Deskripsi tidak boleh kosong.</div>
            </div>

            <!-- Harga -->
            <div class="mb-3">
              <label for="harga" class="form-label fw-bold">Harga <span class="text-danger">*</span></label>
              <input type="number" class="form-control shadow-sm" id="harga" name="harga" value="<?= esc($layanan['harga']) ?>" required>
              <div class="invalid-feedback">Harga wajib diisi.</div>
            </div>

            <!-- Gambar -->
            <div class="mb-4">
              <label for="gambar" class="form-label fw-bold">Gambar Layanan</label>
              <input type="file" class="form-control shadow-sm" id="gambar" name="gambar">
              <small class="text-muted d-block mt-2">Kosongkan jika tidak ingin mengganti gambar.</small>

              <?php if (!empty($layanan['gambar'])): ?>
                <div class="mt-3">
                  <p class="fw-bold">Gambar Saat Ini:</p>
                  <img src="<?= base_url('uploads/layanan/' . $layanan['gambar']) ?>" width="180" class="rounded shadow-sm border">
                </div>
              <?php endif; ?>
            </div>

            <!-- Tombol -->
            <div class="d-flex justify-content-end gap-3">
              <a href="<?= base_url('/admin/layanan') ?>" class="btn btn-secondary px-4">
                <i class="icofont-arrow-left"></i> Batal
              </a>
              <button type="submit" class="btn btn-success px-4 shadow-sm">
                <i class="icofont-save"></i> Perbarui Layanan
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
  // ✅ Validasi form bootstrap
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
