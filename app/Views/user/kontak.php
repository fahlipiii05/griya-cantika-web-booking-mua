

<?= $this->include('layouts/user/header') ?>
<link rel="stylesheet" href="<?= base_url('css/kontak.css') ?>">

<section id="kontak">
  <div class="container">
    <h2><i class="icofont-phone"></i> Hubungi Kami</h2>
    <p class="subtitle">Temukan kami dan hubungi untuk konsultasi makeup terbaik ✨</p>

    <div class="contact-wrapper grid-layout">
      
      <!-- === INFO KONTAK === -->
      <div class="contact-info">
        <h3><i class="icofont-building"></i> Griya Cantika MUA</h3>

        <p class="description">
          <?= esc($kontak['deskripsi'] ?? 'Kami siap membantu kamu tampil cantik dan percaya diri untuk setiap momen spesial ❤️') ?>
        </p>

        <ul class="contact-list">
          <li>
            <i class="icofont-location-pin"></i>
            <div>
              <strong>Alamat:</strong><br>
              <?= esc($kontak['alamat'] ?? 'Belum ada alamat.') ?>
            </div>
          </li>

          <li>
            <i class="icofont-phone"></i>
            <div>
              <strong>Telepon / WhatsApp:</strong><br>
              <a href="https://wa.me/<?= preg_replace('/\D/', '', $kontak['telepon'] ?? '') ?>" target="_blank">
                <?= esc($kontak['telepon'] ?? '-') ?>
              </a>
            </div>
          </li>

          <li>
            <i class="icofont-email"></i>
            <div>
              <strong>Email:</strong><br>
              <a href="mailto:<?= esc($kontak['email'] ?? '-') ?>">
                <?= esc($kontak['email'] ?? '-') ?>
              </a>
            </div>
          </li>
        </ul>

        <!-- === SOSIAL MEDIA === -->
        <h4 class="sosmed-title"><i class="icofont-ui-social-link"></i> Ikuti Kami di Sosial Media</h4>
        <div class="social-links">
          <?php if (!empty($kontak['instagram'])): ?>
            <a href="<?= esc($kontak['instagram']) ?>" class="instagram" target="_blank" title="Instagram">
              <i class="icofont-instagram"></i>
            </a>
          <?php endif; ?>

          <?php if (!empty($kontak['tiktok'])): ?>
            <a href="<?= esc($kontak['tiktok']) ?>" class="tiktok" target="_blank" title="TikTok">
              <i class="icofont-tiktok"></i>
            </a>
          <?php endif; ?>

          <?php if (!empty($kontak['whatsapp'])): ?>
            <a href="<?= esc($kontak['whatsapp']) ?>" class="whatsapp" target="_blank" title="WhatsApp">
              <i class="icofont-whatsapp"></i>
            </a>
          <?php endif; ?>

          <?php if (!empty($kontak['email'])): ?>
            <a href="mailto:<?= esc($kontak['email']) ?>" class="email" target="_blank" title="Email">
              <i class="icofont-email"></i>
            </a>
          <?php endif; ?>
        </div>
      </div>

      <!-- === GOOGLE MAP === -->
      <div class="contact-map">
        <iframe 
          src="<?= esc($kontak['maps_link'] ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.658082574269!2d106.82212551529862!3d-6.175392995528733!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5c5f16b4a5f%3A0xa0f1f233e8e17a72!2sJakarta!5e0!3m2!1sen!2sid!4v1615186351267!5m2!1sen!2sid') ?>" 
          width="100%" height="420" style="border:0;" allowfullscreen="" loading="lazy">
        </iframe>
      </div>

    </div>
  </div>
</section>

<?= $this->include('layouts/user/footer') ?>
