<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Lupa Password - MUA Website</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">
</head>
<body>
<div class="login-container">
    <h2><i class="icofont-ui-forgot"></i> Lupa Password</h2>

    <?php if (session()->getFlashdata('msg')): ?>
        <div class="alert"><?= session()->getFlashdata('msg') ?></div>
    <?php endif; ?>

    <form action="<?= base_url('/forgot-password/send'); ?>" method="post">
        <div class="form-group">
            <label>Email</label>
            <i class="icofont-email"></i>
            <input type="text" name="email" placeholder="Masukkan email terdaftar" required>
        </div>

        <button type="submit">Kirim Link Reset</button>
    </form>

    <p><a href="<?= base_url('/login'); ?>">Kembali ke Login</a></p>
</div>
</body>
</html>
