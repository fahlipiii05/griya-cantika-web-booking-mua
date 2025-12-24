<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Midtrans\Config;
use App\Models\PaymentModel;
use App\Models\BookingModel;

class MidtransCallback extends BaseController
{
    public function notification()
{
    Config::$serverKey = 'SB-Mid-server-XXXX';
    Config::$isProduction = false;
    Config::$isSanitized = true;
    Config::$is3ds = true;

    $notif = json_decode(file_get_contents("php://input"), true);

    if (!$notif || !isset($notif['order_id'])) {
        return $this->response->setStatusCode(400)->setJSON(['error' => 'Invalid payload']);
    }

    $orderId           = $notif['order_id'];
    $transactionId     = $notif['transaction_id'];
    $transactionStatus = $notif['transaction_status'];
    $paymentType       = $notif['payment_type'];
    $grossAmount       = $notif['gross_amount'];

    $parts = explode('-', $orderId);
    $bookingId = $parts[1] ?? null;

    if (!$bookingId) {
        return $this->response->setStatusCode(400)->setJSON(['error' => 'Booking ID tidak ditemukan']);
    }

    $status = match ($transactionStatus) {
        'capture', 'settlement' => 'success',
        'pending'               => 'pending',
        'deny'                  => 'denied',
        'expire'                => 'expired',
        'cancel'                => 'cancelled',
        default                 => 'failed',
    };

    // ✅ Simpan ke database hanya dari sini
    $paymentModel = new PaymentModel();
    $existing = $paymentModel->where('order_id', $orderId)->first();

    if ($existing) {
        // Jika sudah ada, update status saja
        $paymentModel->update($existing['id'], ['status' => $status]);
    } else {
        // Jika belum ada, insert baru
        $paymentModel->insert([
            'booking_id'     => $bookingId,
            'order_id'       => $orderId,
            'transaction_id' => $transactionId,
            'payment_type'   => $paymentType,
            'gross_amount'   => $grossAmount,
            'status'         => $status,
        ]);
    }

    // ✅ Update status booking
    if ($status === 'success') {
        $bookingModel = new BookingModel();
        $bookingModel->update($bookingId, ['status' => 'paid']);
    }

    return $this->response->setJSON(['message' => '✅ Payment saved successfully']);
}

}
