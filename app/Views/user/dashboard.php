<?= $this->include('layouts/user/header') ?>

<!-- === HERO SECTION === -->
<section class="slider_01">
  <div class="container">
    <div class="slider_content">
      <h2>
        Griya Cantika <span>Make Up Artist</span>
      </h2>
      <p>
        Provide quality service for you — tampil cantik dan percaya diri di setiap momen spesialmu 💕
      </p>
      <a href="<?= base_url('user/pesan'); ?>" class="mo_btn">
        <i class="icofont-calendar"></i> Pesan Sekarang
      </a>
    </div>
  </div>
</section>

<!-- === LAYANAN SECTION === -->
<section id="layanan" class="py-5">
  <div class="container">
    
    <!-- Judul & Deskripsi -->
    <h2 class="text-center mb-3">
      <i class="icofont-girl-alt"></i> Layanan Kami
    </h2>

    <!-- Grid Layanan -->
    <div class="service-grid">
      <?php if (!empty($layanan)): ?>
        <?php foreach ($layanan as $l): ?>
          <div class="service-card">
            
            <!-- Gambar -->
            <img 
              src="<?= base_url('uploads/layanan/' . $l['gambar']) ?>" 
              alt="<?= esc($l['nama']) ?>" 
              class="service-img"
            >

            <!-- Konten -->
            <h3>
              <i class="icofont-sparkles"></i> <?= esc($l['nama']) ?>
            </h3>
            <p>
              <?= esc(substr($l['deskripsi'], 0, 120)) ?>
              <?= strlen($l['deskripsi']) > 120 ? '...' : '' ?>
            </p>

            <!-- Tombol Detail -->
            <a href="<?= base_url('user/layanan/detail/' . $l['id']) ?>" class="btn-detail">
              <i class="icofont-eye"></i> Lihat Detail
            </a>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p class="text-center text-muted">Belum ada layanan tersedia.</p>
      <?php endif; ?>
    </div>
  </div>
</section>

<?= $this->include('layouts/user/footer') ?>
