<?= $this->include('layouts/user/header') ?>

<link rel="stylesheet" href="<?= base_url('css/pembayaran.css') ?>">

<section class="payment-section">
  <div class="payment-card">
    <h2>💳 Pembayaran Pesanan</h2>
    <p>Terima kasih, <strong><?= esc($booking['client_name']) ?></strong>!</p>
    <p>Silakan lanjutkan pembayaran untuk layanan:</p>
    <p><strong><?= esc($layanan['nama']) ?></strong></p>
    <div class="payment-amount">
      Rp <?= number_format($harga, 0, ',', '.') ?>
    </div>

    <button id="pay-button" class="btn-payment">💸 Bayar Sekarang</button>
    <a href="<?= base_url('user/dashboard') ?>" class="back-link">← Kembali ke Dashboard</a>
  </div>
</section>

<!-- ✅ Load Snap.js -->
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?= esc($clientKey) ?>"></script>

<script>
document.getElementById('pay-button').addEventListener('click', function () {
  snap.pay('<?= $snapToken ?>', {
    onSuccess: function(result){
      alert("✅ Pembayaran Berhasil!");
      window.location.href = "<?= base_url('user/dashboard') ?>";
    },
    onPending: function(result){
      alert("⏳ Pembayaran Tertunda. Silakan selesaikan pembayaran.");
    },
    onError: function(result){
      alert("❌ Pembayaran gagal.");
      console.log(result);
    }
  });
});
</script>

<?= $this->include('layouts/user/footer') ?>
