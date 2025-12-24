<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Laporan Booking</title>
<style>
  body { font-family: DejaVu Sans, sans-serif; font-size: 14px; }
  h2 { text-align: center; color:rgb(14, 13, 13); }
  table { width: 100%; border-collapse: collapse; margin-top: 20px; }
  th, td { border: 1px solid #ccc; padding: 8px; text-align: center; }
  th { background-color: #f8f8f8; }
</style>
</head>
<body>

<h2>Laporan Booking</h2>
<p>Periode: <?= esc($start_date) ?> s/d <?= esc($end_date) ?></p>

<table>
  <thead>
    <tr>
      <th>#</th>
      <th>Nama Klien</th>
      <th>Layanan</th>
      <th>Tanggal Booking</th>
      <th>Status</th>
      <th>Catatan</th>
    </tr>
  </thead>
  <tbody>
    <?php if (!empty($bookings)): $no = 1; foreach ($bookings as $b): ?>
    <tr>
      <td><?= $no++ ?></td>
      <td><?= esc($b['client_name']) ?></td>
      <td><?= esc($b['service_id']) ?></td>
      <td><?= date('d M Y', strtotime($b['date'])) ?></td>
      <td><?= ucfirst($b['status'] ?? '-') ?></td>
      <td><?= esc($b['notes'] ?? '-') ?></td>
    </tr>
    <?php endforeach; else: ?>
    <tr>
      <td colspan="6">Tidak ada data booking</td>
    </tr>
    <?php endif; ?>
  </tbody>
</table>

<?php
// Statistik kecil di bawah tabel (opsional)
$totalBooking = count($bookings);
$statusCount = [
  'pending' => 0,
  'confirmed' => 0,
  'completed' => 0,
  'canceled' => 0
];
foreach ($bookings as $b) {
    $status = strtolower($b['status'] ?? '');
    if (isset($statusCount[$status])) $statusCount[$status]++;
}
?>

<h3 style="text-align: right; margin-top: 20px;">Total Booking: <?= $totalBooking ?></h3>
<p style="text-align: right; font-size: 12px;">
  Pending: <?= $statusCount['pending'] ?> |
  Dikonfirmasi: <?= $statusCount['confirmed'] ?> |
  Selesai: <?= $statusCount['completed'] ?> |
  Dibatalkan: <?= $statusCount['canceled'] ?>
</p>

</body>
</html>
