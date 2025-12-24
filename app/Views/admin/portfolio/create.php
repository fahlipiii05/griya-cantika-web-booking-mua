<?= $this->include('layouts/admin/header') ?>
<?= $this->include('layouts/admin/sidebar') ?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
  <div id="content">
    <?= $this->include('layouts/admin/topbar') ?>

    <div class="container-fluid py-4">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">📸 Tambah Portfolio Baru</h1>
        <a href="<?= base_url('admin/portfolio') ?>" class="btn btn-secondary">
          <i class="icofont-arrow-left"></i> Kembali
        </a>
      </div>

      <div class="card shadow">
        <div class="card-header bg-gradient-primary text-white">
          <h6 class="m-0 font-weight-bold">🖼️ Form Tambah Portfolio</h6>
        </div>

        <div class="card-body">
          <form action="<?= base_url('admin/portfolio/store') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <!-- Judul -->
            <div class="mb-3">
              <label for="judul" class="form-label fw-bold">Judul Portfolio</label>
              <input type="text" name="judul" id="judul" class="form-control" placeholder="Contoh: Elegant Wedding Look" required>
            </div>

            <!-- Deskripsi -->
            <div class="mb-3">
              <label for="deskripsi" class="form-label fw-bold">Deskripsi</label>
              <textarea name="deskripsi" id="deskripsi" rows="4" class="form-control" placeholder="Deskripsikan makeup atau hasil karya ini..." required></textarea>
            </div>

            <!-- Kategori -->
            <div class="mb-3">
              <label for="kategori" class="form-label fw-bold">Kategori</label>
              <select name="kategori" id="kategori" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                <option value="wedding">Wedding</option>
                <option value="graduation">Graduation</option>
                <option value="party">Party</option>
                <option value="Engaged">Engaged</option>
                <option value="Prewedding">Prewedding</option>
              </select>
            </div>

            <!-- Gambar -->
            <div class="mb-4">
              <label for="gambar" class="form-label fw-bold">Upload Gambar</label>
              <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*" required>
              <small class="text-muted">Format yang didukung: JPG, PNG, JPEG.</small>
            </div>

            <div class="d-flex justify-content-end gap-3">
              <a href="<?= base_url('admin/portfolio') ?>" class="btn btn-secondary px-4">
                <i class="icofont-arrow-left"></i> Batal
              </a>
              <button type="submit" class="btn btn-success px-4">
                <i class="icofont-save"></i> Simpan Portfolio
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>

  </div>
  <?= $this->include('layouts/admin/footer') ?>
</div>
<!-- End of Content Wrapper -->
