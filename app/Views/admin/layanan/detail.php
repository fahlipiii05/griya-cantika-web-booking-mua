<?= $this->include('layouts/admin/header') ?>
<?= $this->include('layouts/admin/sidebar') ?>

<div id="content-wrapper" class="d-flex flex-column">
  <div id="content">
    <?= $this->include('layouts/admin/topbar') ?>

    <div class="container-fluid py-4">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 text-gray-800"><i class="icofont-makeup"></i> Edit Detail Layanan</h1>
        <a href="<?= base_url('/admin/layanan') ?>" class="btn btn-secondary"><i class="icofont-arrow-left"></i> Kembali</a>
      </div>

      <div class="card shadow">
        <div class="card-header bg-gradient-primary text-white">
          <h5 class="m-0">🛠️ Ubah Detail Layanan</h5>
        </div>

        <div class="card-body">
          <form action="<?= base_url('/admin/layanan/update/'.$layanan['id']) ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <!-- Nama -->
            <div class="mb-3">
              <label for="nama" class="form-label fw-bold">Nama Layanan</label>
              <input type="text" name="nama" id="nama" class="form-control" value="<?= esc($layanan['nama']) ?>" required>
            </div>

            <!-- Deskripsi -->
            <div class="mb-3">
              <label for="deskripsi" class="form-label fw-bold">Deskripsi</label>
              <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control" required><?= esc($layanan['deskripsi']) ?></textarea>
            </div>

            <!-- Harga -->
            <div class="mb-3">
              <label for="harga" class="form-label fw-bold">Harga</label>
              <input type="number" name="harga" id="harga" class="form-control" value="<?= esc($layanan['harga']) ?>" required>
            </div>

            <!-- Gambar -->
            <div class="mb-4">
              <label class="form-label fw-bold">Gambar Layanan</label>
              <input type="file" name="gambar" class="form-control mb-2">
              <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar.</small>

              <?php if (!empty($layanan['gambar'])): ?>
                <div class="mt-3">
                  <p class="fw-bold mb-1">Gambar Saat Ini:</p>
                  <img src="<?= base_url('uploads/layanan/' . $layanan['gambar']) ?>" alt="Preview" width="220" class="rounded shadow-sm border">
                </div>
              <?php endif; ?>
            </div>

            <div class="d-flex justify-content-end gap-3">
              <a href="<?= base_url('/admin/layanan') ?>" class="btn btn-secondary px-4">
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
