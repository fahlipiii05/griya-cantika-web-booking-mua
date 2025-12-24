<?= $this->include('layouts/user/header') ?>

<!-- Tambahkan CSS eksternal -->
<link rel="stylesheet" href="<?= base_url('css/detail-layanan.css') ?>">

<!-- === DETAIL SECTION === -->
<section class="detail-layanan">
  <div class="detail-container">
    <!-- IMAGE -->
    <div class="detail-image">
      <img src="<?= base_url('uploads/layanan/' . esc($layanan['gambar'])) ?>" alt="<?= esc($layanan['nama']) ?>">
    </div>

    <!-- CONTENT -->
    <div class="detail-content">
      <h2><i class="icofont-makeup"></i> <?= esc($layanan['nama']) ?></h2>
      <p><?= esc($layanan['deskripsi']) ?></p>

      <div class="price">
        Harga: <span>Rp <?= number_format($layanan['harga'], 0, ',', '.') ?></span>
      </div>

      <div class="detail-actions">
        <a href="<?= base_url('user/pesan') ?>" class="btn-pesan">
          <i class="icofont-calendar"></i> Pesan Sekarang
        </a>
        <a href="<?= base_url('/user/dashboard#layanan') ?>" class="btn-back">
          <i class="icofont-arrow-left"></i> Kembali
        </a>
      </div>
    </div>
  </div>
</section>

<?= $this->include('layouts/user/footer') ?>
