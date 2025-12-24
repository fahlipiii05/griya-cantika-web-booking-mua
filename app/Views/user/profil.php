<?= $this->include('layouts/user/header') ?>

<!-- ======= CSS ======= -->
<link rel="stylesheet" href="<?= base_url('css/profil.css') ?>">

<!-- 🌸 HEADER PROFIL -->
<section id="profile-header">
  <h2>👤 Profil Saya</h2>
  <p>Kelola informasi pribadi dan keamanan akun Anda.</p>
</section>

<!-- 🌸 SECTION PROFIL -->
<section class="profile-section">
  <div class="card profile-card">
    <form action="<?= base_url('user/profil/update') ?>" method="post" enctype="multipart/form-data">
      <?= csrf_field() ?>

      <!-- Nama Lengkap -->
      <div class="mb-4">
        <label class="form-label">Nama Lengkap</label>
        <input type="text" name="name" class="form-control" 
               value="<?= esc($user['name'] ?? '') ?>" required>
      </div>

      <!-- Email -->
      <div class="mb-4">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control bg-light" 
               value="<?= esc($user['email'] ?? '') ?>" readonly>
      </div>

      <!-- Nomor Telepon -->
      <div class="mb-4">
  <label class="form-label">Nomor Telepon</label>
  <input type="text" name="phone" class="form-control" 
         placeholder="08xxxxxxxxxx" 
         value="<?= esc($user['phone'] ?? '') ?>"> <!-- ✅ pastikan ini -->
</div>

<!-- Alamat -->
<div class="mb-5">
  <label class="form-label">Alamat</label>
  <textarea name="address" class="form-control" rows="3"
            placeholder="Masukkan alamat lengkap"><?= esc($user['address'] ?? '') ?></textarea> <!-- ✅ address -->
</div>

      <div class="mb-3">
        <label class="form-label">Password Lama</label>
        <input type="password" name="old_password" class="form-control" placeholder="Masukkan password lama">
      </div>

      <div class="mb-3">
        <label class="form-label">Password Baru</label>
        <input type="password" name="new_password" class="form-control" placeholder="Masukkan password baru">
      </div>

      <div class="mb-4">
        <label class="form-label">Konfirmasi Password Baru</label>
        <input type="password" name="confirm_password" class="form-control" placeholder="Ulangi password baru">
      </div>
      <div>

      <!-- Tombol Aksi -->
      <button type="submit" class="btn w-100 btn-submit">
        <i class="icofont-save"></i> Simpan Perubahan
      </button>

      <a href="<?= base_url('user/dashboard') ?>" class="btn btn-back mt-3 w-100">
        <i class="icofont-arrow-left"></i> Kembali ke Dashboard
      </a>
    </form>
  </div>
</section>

<?= $this->include('layouts/user/footer') ?>
