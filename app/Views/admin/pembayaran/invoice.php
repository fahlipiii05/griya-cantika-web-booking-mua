<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Invoice #<?= esc($payment['id']) ?></title>
  <link rel="stylesheet" href="<?= base_url('css/invoice.css') ?>">
</head>
<body onload="window.print()">

  <div class="invoice-container">
    <h1>Invoice Pembayaran</h1>

    <p><strong>ID Pembayaran:</strong> <?= esc($payment['id']) ?></p>
    <p><strong>Order ID:</strong> <?= esc($payment['order_id']) ?></p>
    <p><strong>Tanggal Pembayaran:</strong> <?= date('d M Y H:i', strtotime($payment['payment_time'])) ?></p>

    <hr>

    <h3>Data Klien</h3>
    <p><strong>Nama:</strong> <?= esc($payment['client_name']) ?></p>
    <p><strong>Email:</strong> <?= esc($payment['email']) ?></p>
    <p><strong>Telepon:</strong> <?= esc($payment['phone']) ?></p>
    <p><strong>Alamat:</strong> <?= esc($payment['address']) ?></p>

    <hr>

    <h3>Detail Layanan</h3>
    <table>
      <tr>
        <th>Layanan</th>
        <th>Tanggal</th>
        <th>Jam</th>
        <th>Harga</th>
      </tr>
      <tr>
        <td><?= esc($payment['service_name']) ?></td>
        <td><?= date('d-m-Y', strtotime($payment['date'])) ?></td>
        <td><?= esc($payment['time']) ?></td>
        <td>Rp <?= number_format($payment['harga'], 0, ',', '.') ?></td>
      </tr>
    </table>

    <h2 class="total">Total: Rp <?= number_format($payment['gross_amount'], 0, ',', '.') ?></h2>

    <div class="footer">
      Terima kasih telah menggunakan layanan kami 💖<br>
      <em>Griya Cantika MUA</em>
    </div>
  </div>

</body>
</html>
