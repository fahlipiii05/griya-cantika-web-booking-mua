<?= $this->include('layouts/user/header') ?>

<!-- Tambahkan CSS -->
<link rel="stylesheet" href="<?= base_url('css/portfolio.css') ?>">

<section id="portfolio">
  <h2><i class="icofont-makeup"></i> Portfolio MUA</h2>
  <p class="subtitle">Hasil karya terbaik kami untuk berbagai momen spesial ✨</p>

  <!-- Filter Tabs -->
  <div class="portfolio-tabs">
    <button class="active" onclick="filterPortfolio('all')">Semua</button>
    <button onclick="filterPortfolio('wedding')">Wedding</button>
    <button onclick="filterPortfolio('graduation')">Graduation</button>
    <button onclick="filterPortfolio('prewedding')">Prewedding</button>
    <button onclick="filterPortfolio('party')">Party</button>
    <button onclick="filterPortfolio('engaged')">engaged</button>
  </div>

  <!-- Portfolio Grid -->
  <div class="portfolio-grid">
    <?php if (!empty($portfolio)): ?>
      <?php foreach ($portfolio as $p): ?>
        <div class="portfolio-card <?= esc(strtolower($p['kategori'])) ?>">
          <img src="<?= base_url('uploads/portfolio/' . esc($p['gambar'])) ?>" alt="<?= esc($p['judul']) ?>">
          <div class="portfolio-info">
            <h4><?= esc($p['judul']) ?></h4>
            <p><?= esc($p['deskripsi']) ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <p class="text-center text-muted">Belum ada portfolio yang ditambahkan.</p>
    <?php endif; ?>
  </div>

  <!-- CTA Booking -->
  <div class="booking-cta">
    <a href="<?= base_url('user/pesan') ?>"><i class="icofont-calendar"></i> Booking Sekarang</a>
  </div>
</section>

<script>
function filterPortfolio(category) {
  const cards = document.querySelectorAll('.portfolio-card');
  cards.forEach(card => {
    card.style.display = (category === 'all' || card.classList.contains(category)) ? 'block' : 'none';
  });
  document.querySelectorAll('.portfolio-tabs button').forEach(btn => btn.classList.remove('active'));
  event.target.classList.add('active');
}
</script>

<?= $this->include('layouts/user/footer') ?>
