<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Akun - MUA Website</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">
</head>
<body>
<div class="login-container">
    <h2><i class="icofont-user-alt-7"></i> Daftar Akun</h2>

    <?php if (session()->getFlashdata('msg')): ?>
        <div class="alert"><?= session()->getFlashdata('msg') ?></div>
    <?php endif; ?>

    <form action="<?= base_url('auth/store'); ?>" method="post">
        <div class="form-group">
            <label>Nama Lengkap</label>
            <i class="icofont-user"></i>
            <input type="text" name="name" placeholder="Masukkan nama lengkap" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <i class="icofont-email"></i>
            <input type="email" name="email" placeholder="Masukkan email" required>
        </div>

        <div class="form-group">
            <label>Password</label>
            <i class="icofont-lock"></i>
            <input type="password" name="password" placeholder="Masukkan password" required>
        </div>

        <!-- Tambahan baru -->
        <div class="form-group">
            <label>Nomor Telepon</label>
            <i class="icofont-phone"></i>
            <input type="text" name="phone" placeholder="Masukkan nomor telepon aktif" required>
        </div>

        <div class="form-group">
            <label>Alamat</label>
            <i class="icofont-location-pin"></i>
            <input type="text" name="alamat" placeholder="Masukkan alamat" required>
        </div>

        <button type="submit">Daftar</button>
    </form>

    <p>Sudah punya akun? <a href="<?= base_url('/login'); ?>">Login</a></p>
</div>
</body>
</html>
