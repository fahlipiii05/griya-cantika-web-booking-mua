<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title><?= esc($title ?? 'Griya Cantika MUA | Make Up Artist Kuningan Profesional') ?></title>

  <!-- ✅ SEO Lokal Meta Tags -->
  <meta name="description" content="<?= esc($meta_description ?? 'Griya Cantika MUA adalah jasa make up artist profesional di Kuningan yang melayani rias pengantin, wisuda, lamaran, dan photoshoot. Booking mudah, hasil memuaskan!') ?>">
  <meta name="keywords" content="MUA Kuningan, Make Up Artist Kuningan, Rias Pengantin Kuningan, Rias Wisuda Kuningan, Griya Cantika">
  <meta name="author" content="Griya Cantika MUA">
  <meta name="robots" content="index, follow">
  <meta name="geo.region" content="ID-JB">
  <meta name="geo.placename" content="Kuningan, Jawa Barat">
  <meta name="geo.position" content="-6.983;108.485">
  <meta name="ICBM" content="-6.983, 108.485">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- ✅ Open Graph untuk Social Media -->
  <meta property="og:title" content="<?= esc($title ?? 'Griya Cantika MUA - Make Up Artist Kuningan') ?>">
  <meta property="og:description" content="Tampil menawan di hari spesialmu bersama Griya Cantika. Makeup profesional untuk pengantin, wisuda, dan event spesial lainnya di Kuningan.">
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?= current_url() ?>">
  <meta property="og:image" content="<?= base_url('uploads/logo.png') ?>">
  <meta property="og:locale" content="id_ID">

  <!-- ✅ Schema Markup (Local Business JSON-LD) -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "BeautySalon",
    "name": "Griya Cantika MUA",
    "image": "<?= base_url('uploads/logo.png') ?>",
    "url": "<?= base_url() ?>",
    "telephone": "+62-812-3456-7890",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "Jl. Siliwangi No. 21",
      "addressLocality": "Kuningan",
      "addressRegion": "Jawa Barat",
      "postalCode": "45511",
      "addressCountry": "ID"
    },
    "geo": {
      "@type": "GeoCoordinates",
      "latitude": -6.983,
      "longitude": 108.485
    },
    "openingHours": "Mo-Su 08:00-20:00",
    "priceRange": "$$",
    "sameAs": [
      "https://www.instagram.com/griya_cantikaa",
      "https://www.facebook.com/griyacantika",
      "https://maps.app.goo.gl/abcdef" 
    ]
  }
  </script>

  <!-- Fonts & Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/icofont@1.0.1/icofont.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&display=swap" rel="stylesheet">

  <!-- CSS Global -->
  <link rel="stylesheet" href="<?= base_url('css/layanan.css') ?>">
  <link rel="stylesheet" href="<?= base_url('css/header.css') ?>">
</head>


<body>
  <header>
    <div class="header-container">

      <!-- ✅ LOGO -->
      <div class="logo">
        <a href="<?= base_url('/') ?>">
          <i class="icofont-makeup" style="font-size: 32px; color: #ff66b2;"></i>
        </a>
      </div>

      <!-- JUDUL -->
      <h1>Griya Cantika Makeup</h1>

      <!-- NAVIGASI -->
      <nav>
        <a href="<?= base_url('/') ?>" class="<?= (uri_string() == '' ? 'active' : '') ?>">
          <i class="icofont-home"></i> Beranda
        </a>
        <a href="<?= base_url('/user/dashboard#layanan') ?>" class="<?= (uri_string() == 'user/layanan' ? 'active' : '') ?>">
          <i class="icofont-ui-makeup"></i> Layanan
        </a>
        <a href="<?= base_url('/user/portfolio') ?>" class="<?= (uri_string() == 'user/portfolio' ? 'active' : '') ?>">
          <i class="icofont-camera-alt"></i> Portfolio
        </a>
        <a href="<?= base_url('/user/kontak') ?>" class="<?= (uri_string() == 'user/kontak' ? 'active' : '') ?>">
          <i class="icofont-phone"></i> Kontak
        </a>

        <?php if (session()->get('logged_in')): ?>
          <!-- Jika user sudah login -->
          <a href="<?= base_url('/user/pesan') ?>" class="<?= (uri_string() == 'user/pesan' ? 'active' : '') ?>">
            <i class="icofont-ui-message"></i> Pesan
          </a>
          <a href="<?= base_url('/user/profil') ?>" class="<?= (uri_string() == 'user/profil' ? 'active' : '') ?>">
            <i class="icofont-user"></i> Profil
          </a>
        <?php endif; ?>
      </nav>

      <!-- 🔐 LOGIN / LOGOUT BUTTON -->
      <?php if (session()->get('logged_in')): ?>
        <a href="<?= base_url('/logout') ?>" class="logout-btn">
          <i class="icofont-logout"></i> Logout
        </a>
      <?php else: ?>
        <a href="<?= base_url('/login') ?>" class="logout-btn">
          <i class="icofont-login"></i> Login
        </a>
      <?php endif; ?>

    </div>
  </header>
</body>
</html>
