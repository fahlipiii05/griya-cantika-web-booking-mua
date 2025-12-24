<?= $this->include('layouts/user/header') ?>

<!-- Tambahkan link ke file CSS -->
<link rel="stylesheet" href="<?= base_url('css/booking-form.css') ?>">

<!-- ======= HEADER BOOKING ======= -->
<section id="booking-header">
  <h2>💄 Lengkapi Data Booking</h2>
  <p>
    Pastikan semua data sudah benar sebelum mengirim. Kami akan menghubungi Anda untuk konfirmasi selanjutnya.
  </p>
</section>

<!-- ======= CARD FORM BOOKING ======= -->
<section class="booking-section">
  <div class="card booking-card">
    <form id="bookingForm" style="width: 100%;">
      <input type="hidden" name="date" value="<?= esc($_GET['date'] ?? '') ?>">

      <!-- Nama Lengkap -->
<div class="mb-4">
  <label class="form-label">Nama Lengkap</label>
  <input type="text" name="client_name" class="form-control"
         value="<?= esc($user['name'] ?? '') ?>" readonly>
</div>

<!-- Alamat -->
<div class="mb-4">
  <label class="form-label">Alamat</label>
  <textarea name="address" class="form-control" readonly><?= esc($user['address'] ?? '') ?></textarea>
</div>

<!-- Email -->
<div class="mb-4">
  <label class="form-label">Email</label>
  <input type="email" name="email" class="form-control"
         value="<?= esc($user['email'] ?? '') ?>" readonly>
</div>

<!-- No Telepon -->
<div class="mb-4">
  <label class="form-label">No. Telepon</label>
  <input type="text" name="phone" class="form-control"
         value="<?= esc($user['phone'] ?? '') ?>" readonly>
</div>


      <!-- Jam -->
      <div class="mb-4">
        <label class="form-label">Jam</label>
        <input type="time" name="time" class="form-control" required>
      </div>

      <!-- Layanan -->
<div class="mb-5">
  <label class="form-label">Layanan</label>
  <select name="service_id" class="form-select" required>
    <option value="">-- Pilih Layanan --</option>
    <?php foreach ($layanan as $l): ?>
      <option value="<?= esc($l['id']) ?>">
        💄 <?= esc($l['nama']) ?> - Rp <?= number_format($l['harga'], 0, ',', '.') ?>
      </option>
    <?php endforeach; ?>
  </select>
</div>

      <!-- Tombol Submit -->
      <button class="btn w-100 btn-submit" type="submit">
        <i class="icofont-check-alt"></i> Kirim Booking
      </button>
    </form>
  </div>
</section>

<?= $this->include('layouts/user/footer') ?>

<!-- ======= Submit Script ======= -->
<script>
document.getElementById('bookingForm').addEventListener('submit', function(e) {
  e.preventDefault();
  fetch('<?= base_url('calendar/book') ?>', {
    method: 'POST',
    body: new FormData(this)
  })
  .then(res => res.json())
  .then(data => {
    if (data.success) {
  alert('✅ Booking berhasil dikirim! Admin akan mengonfirmasi jadwal Anda.');
  window.location.href = "<?= base_url('user/pembayaran/checkout/') ?>" + data.booking_id;
    } else {
      alert('❌ Terjadi kesalahan saat mengirim booking. Coba lagi.');
    }
  })
  .catch(err => console.error('Error:', err));
});
</script>
