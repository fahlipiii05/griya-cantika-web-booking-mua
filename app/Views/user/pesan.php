<?= $this->include('layouts/user/header') ?>

<!-- ======= HEADER HALAMAN PESAN ======= -->
<section id="pesan-header" style="padding-top: 40px;">
  <h2><i class="icofont-calendar"></i> Pilih Tanggal Booking</h2>
  <p>Klik tanggal yang masih tersedia untuk melakukan pemesanan layanan makeup.</p>
</section>

<!-- ======= KALENDER BOOKING ======= -->
<main class="container py-5" style="min-height: 85vh;">
  <div class="d-flex justify-content-center">
    <div id="calendar" class="shadow rounded bg-white p-4 w-100" style="max-width: 1000px; min-height: 650px;"></div>
  </div>
</main>

<?= $this->include('layouts/user/footer') ?>

<!-- ======= External Libraries ======= -->
<link rel="stylesheet" href="<?= base_url('css/calendar.css') ?>">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
  let calendarEl = document.getElementById('calendar');

  let calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    locale: 'id',
    selectable: true,
    height: 'auto',
    events: '<?= base_url('calendar/events') ?>',

    dateClick: function(info) {
      const isBooked = calendar.getEvents().some(e => e.startStr === info.dateStr && e.extendedProps.status === 'booked');

      if (isBooked) {
        alert('❌ Maaf, tanggal ini sudah penuh. Silakan pilih tanggal lain.');
        return;
      }

      // ✅ Redirect ke halaman form booking
      window.location.href = "<?= base_url('user/booking-form') ?>?date=" + info.dateStr;
    },

    eventContent: function(arg) {
      let bgColor = arg.event.extendedProps.status === 'booked' ? '#ff4d6d' : '#52c41a';
      let label = arg.event.extendedProps.status === 'booked' ? 'Penuh' : 'Tersedia';
      return {
        html: `<div style="background:${bgColor};color:white;padding:3px;border-radius:4px;font-size:12px;text-align:center;">
                ${label}
              </div>`
      }
    }
  });

  calendar.render();
});
</script>
