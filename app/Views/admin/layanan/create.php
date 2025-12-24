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
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">💄 Tambah Layanan Baru</h1>
        <a href="<?= base_url('/admin/layanan') ?>" class="btn btn-secondary shadow-sm">
          <i class="icofont-arrow-left"></i> Kembali
        </a>
      </div>

      <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
      <?php endif; ?>

      <!-- Form Tambah Layanan -->
      <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gradient-primary text-white">
          <h6 class="m-0 font-weight-bold">📝 Formulir Layanan</h6>
        </div>

        <div class="card-body">
          <form action="<?= base_url('/admin/layanan/store') ?>" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
            
            <!-- Nama Layanan -->
            <div class="mb-3">
              <label for="nama" class="form-label fw-bold">Nama Layanan <span class="text-danger">*</span></label>
              <input type="text" name="nama" id="nama" class="form-control shadow-sm" placeholder="Contoh: Makeup Pengantin" required>
              <div class="invalid-feedback">Nama layanan wajib diisi.</div>
            </div>

            <!-- Deskripsi -->
            <div class="mb-3">
              <label for="deskripsi" class="form-label fw-bold">Deskripsi <span class="text-danger">*</span></label>
              <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control shadow-sm" placeholder="Tuliskan deskripsi layanan secara detail..." required></textarea>
              <div class="invalid-feedback">Deskripsi tidak boleh kosong.</div>
            </div>

            <!-- Gambar -->
            <div class="mb-4">
              <label for="gambar" class="form-label fw-bold">Gambar Layanan</label>
              <input type="file" name="gambar" id="gambar" class="form-control shadow-sm">
              <small class="text-muted">Format yang didukung: JPG, PNG, JPEG. Ukuran maksimal 2MB.</small>
            </div>

            <!-- Tombol Simpan -->
            <div class="d-flex justify-content-end">
              <button type="submit" class="btn btn-success px-4 shadow-sm">
                <i class="icofont-save"></i> Simpan Layanan
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
