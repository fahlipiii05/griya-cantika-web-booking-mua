<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - MUA Website</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">
</head>
<body>
<div class="login-container">
    <h2><i class="icofont-makeup"></i> Login </h2>

    <?php if (session()->getFlashdata('msg')): ?>
        <div class="alert"><?= session()->getFlashdata('msg') ?></div>
    <?php endif; ?>

    <form action="<?= base_url('/loginAuth'); ?>" method="post">
        <div class="form-group">
            <label>Email</label>
            <i class="icofont-email"></i>
            <input type="text" name="email" placeholder="Masukkan email" required>
        </div>

        <div class="form-group">
            <label>Password</label>
            <i class="icofont-lock"></i>
            <input type="password" name="password" placeholder="Masukkan password" required>
        </div>

        <button type="submit">Masuk</button>
    </form>

    <p>Belum punya akun? <a href="<?= base_url('/register'); ?>">Daftar</a></p>
    <p><a href="<?= base_url('/forgot-password'); ?>">Lupa Password?</a></p>
</div>
</body>
</html>
