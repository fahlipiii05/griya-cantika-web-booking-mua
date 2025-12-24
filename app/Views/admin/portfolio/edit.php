<?= $this->include('layouts/admin/header') ?>
<?= $this->include('layouts/admin/sidebar') ?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
  <div id="content">
    <?= $this->include('layouts/admin/topbar') ?>

    <div class="container-fluid py-4">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">📸 Edit Portfolio</h1>
        <a href="<?= base_url('admin/portfolio') ?>" class="btn btn-secondary">
          <i class="icofont-arrow-left"></i> Kembali
        </a>
      </div>

      <div class="card shadow">
        <div class="card-header bg-gradient-primary text-white">
          <h6 class="m-0 font-weight-bold">🖼️ Form Edit Portfolio</h6>
        </div>

        <div class="card-body">
          <form action="<?= base_url('admin/portfolio/update/' . $portfolio['id']) ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <!-- Judul -->
            <div class="mb-3">
              <label for="judul" class="form-label fw-bold">Judul Portfolio</label>
              <input type="text" name="judul" id="judul" class="form-control" value="<?= esc($portfolio['judul']) ?>" required>
            </div>

            <!-- Deskripsi -->
            <div class="mb-3">
              <label for="deskripsi" class="form-label fw-bold">Deskripsi</label>
              <textarea name="deskripsi" id="deskripsi" rows="4" class="form-control" required><?= esc($portfolio['deskripsi']) ?></textarea>
            </div>

            <!-- Kategori -->
            <div class="mb-3">
              <label for="kategori" class="form-label fw-bold">Kategori</label>
              <select name="kategori" id="kategori" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                <option value="wedding" <?= $portfolio['kategori'] == 'wedding' ? 'selected' : '' ?>>Wedding</option>
                <option value="graduation" <?= $portfolio['kategori'] == 'graduation' ? 'selected' : '' ?>>Graduation</option>
                <option value="party" <?= $portfolio['kategori'] == 'party' ? 'selected' : '' ?>>Party</option>
                <option value="engaged" <?= $portfolio['kategori'] == 'engaged' ? 'selected' : '' ?>>Engaged</option>
                <option value="prewedding" <?= $portfolio['kategori'] == 'prewedding' ? 'selected' : '' ?>>Prewedding</option>
              </select>
            </div>

            <!-- Gambar -->
            <div class="mb-4">
              <label for="gambar" class="form-label fw-bold">Upload Gambar</label>
              <?php if (!empty($portfolio['gambar'])): ?>
                <div class="mb-2">
                  <img src="<?= base_url('uploads/portfolio/' . $portfolio['gambar']) ?>" width="150" class="img-thumbnail">
                </div>
              <?php endif; ?>
              <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*">
              <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar.</small>
            </div>

            <div class="d-flex justify-content-end gap-3">
              <a href="<?= base_url('admin/portfolio') ?>" class="btn btn-secondary px-4">
                <i class="icofont-arrow-left"></i> Batal
              </a>
              <button type="submit" class="btn btn-success px-4">
                <i class="icofont-save"></i> Simpan Perubahan
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
