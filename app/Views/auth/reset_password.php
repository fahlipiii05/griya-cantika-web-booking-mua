<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Reset Password - MUA Website</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">
</head>
<body>
<div class="login-container">
    <h2>Reset Password</h2>

    <?php if (session()->getFlashdata('msg')): ?>
        <div class="alert"><?= session()->getFlashdata('msg') ?></div>
    <?php endif; ?>

    <form action="<?= base_url('/reset-password/update'); ?>" method="post">
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" required>
        </div>
        <div class="form-group">
            <label>Password Baru</label>
            <input type="password" name="password" required>
        </div>
        <button type="submit">Ganti Password</button>
    </form>

    <p><a href="<?= base_url('/login'); ?>">Kembali ke Login</a></p>
</div>
</body>
</html>
