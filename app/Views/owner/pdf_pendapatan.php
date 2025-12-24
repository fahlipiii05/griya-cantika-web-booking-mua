<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Laporan Pendapatan</title>
<style>
  body { font-family: DejaVu Sans, sans-serif; font-size: 14px; }
  h2 { text-align: center; color:rgb(14, 13, 13); }
  table { width: 100%; border-collapse: collapse; margin-top: 20px; }
  th, td { border: 1px solid #ccc; padding: 8px; text-align: center; }
  th { background-color: #f8f8f8; }
</style>
</head>
<body>

<h2>Laporan Pendapatan</h2>
<p>Periode: <?= esc($start_date) ?> s/d <?= esc($end_date) ?></p>

<table>
  <thead>
    <tr>
      <th>#</th>
      <th>Nama Klien</th>
      <th>Layanan</th>
      <th>Tanggal Pembayaran</th>
      <th>Metode</th>
      <th>Total</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    <?php if (!empty($pembayaran)): $no = 1; foreach ($pembayaran as $p): ?>
    <tr>
      <td><?= $no++ ?></td>
      <td><?= esc($p['client_name']) ?></td>
      <td><?= esc($p['service_name'] ?? '-') ?></td>
      <td><?= date('d M Y H:i', strtotime($p['payment_time'])) ?></td>
      <td><?= esc($p['payment_type']) ?></td>
      <td>Rp <?= number_format($p['gross_amount'], 0, ',', '.') ?></td>
      <td><?= ucfirst($p['status']) ?></td>
    </tr>
    <?php endforeach; else: ?>
    <tr>
      <td colspan="7">Tidak ada data pembayaran untuk periode ini.</td>
    </tr>
    <?php endif; ?>
  </tbody>
</table>

<h3 style="text-align: right; margin-top: 20px;">
  Total Pendapatan: Rp <?= number_format($total, 0, ',', '.') ?>
</h3>

</body>
</html>
