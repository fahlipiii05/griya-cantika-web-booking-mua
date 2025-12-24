<?= $this->include('layouts/admin/header') ?>
<?= $this->include('layouts/admin/sidebar') ?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">
    <?= $this->include('layouts/admin/topbar') ?>

    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Kelola Halaman Kontak</h1>
      </div>

      <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
      <?php endif; ?>

      <!-- Form Kontak -->
      <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gradient-primary text-white">
          <h6 class="m-0 font-weight-bold">📞 Informasi Kontak</h6>
        </div>

        <div class="card-body">
          <form action="<?= base_url('/admin/kontak/update') ?>" method="post">
            <?= csrf_field() ?>

            <div class="mb-3">
              <label class="form-label">📍 Alamat</label>
              <textarea name="alamat" class="form-control" rows="3"><?= esc($kontak['alamat'] ?? '') ?></textarea>
            </div>

            <div class="mb-3">
              <label class="form-label">📞 Nomor Telepon / WhatsApp</label>
              <input type="text" name="telepon" class="form-control" value="<?= esc($kontak['telepon'] ?? '') ?>">
            </div>

            <div class="mb-3">
              <label class="form-label">📧 Email</label>
              <input type="email" name="email" class="form-control" value="<?= esc($kontak['email'] ?? '') ?>">
            </div>

            <hr>

            <h5 class="text-primary mb-3"><i class="fas fa-share-alt"></i> Sosial Media</h5>

            <div class="mb-3">
              <label class="form-label">Instagram</label>
              <input type="text" name="instagram" class="form-control" value="<?= esc($kontak['instagram'] ?? '') ?>">
            </div>

            <div class="mb-3">
              <label class="form-label">TikTok</label>
              <input type="text" name="tiktok" class="form-control" value="<?= esc($kontak['tiktok'] ?? '') ?>">
            </div>

            <div class="mb-3">
              <label class="form-label">WhatsApp URL</label>
              <input type="text" name="whatsapp" class="form-control" value="<?= esc($kontak['whatsapp'] ?? '') ?>">
            </div>

            <div class="mb-3">
              <label class="form-label">Google Maps Embed Link</label>
              <input type="text" name="maps_link" class="form-control" value="<?= esc($kontak['maps_link'] ?? '') ?>">
            </div>

            <div class="text-end">
              <button type="submit" class="btn btn-success px-4">
                <i class="fas fa-save"></i> Simpan Perubahan
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
