<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\BookingModel;
use App\Models\LayananModel;
use Config\Midtrans;
use Midtrans\Snap;
use Midtrans\Config as MidtransConfig;

class Pembayaran extends BaseController
{
    public function checkout($bookingId)
    {
        $bookingModel = new BookingModel();
        $layananModel = new LayananModel();

        // 🔎 Ambil data booking
        $booking = $bookingModel->find($bookingId);
        if (!$booking) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Booking tidak ditemukan.");
        }

        // 🔎 Ambil data layanan berdasarkan ID
        $layanan = $layananModel->find($booking['service_id']);
        if (!$layanan) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Layanan tidak ditemukan.");
        }

        // Ambil harga dari database
        $harga = $layanan['harga'];

        // ✅ Konfigurasi Midtrans
        $midtrans = new Midtrans();
        MidtransConfig::$serverKey = $midtrans->serverKey;
        MidtransConfig::$isProduction = $midtrans->isProduction;
        MidtransConfig::$isSanitized = true;
        MidtransConfig::$is3ds = true;

        // ✅ Kirim data ke Midtrans
        $params = [
            'transaction_details' => [
                'order_id' => 'ORDER-' . $booking['id'] . '-' . time(),
                'gross_amount' => $harga
            ],
            'customer_details' => [
                'first_name' => $booking['client_name'],
                'email'      => $booking['email'],
                'phone'      => $booking['phone'],
            ]
        ];

        $snapToken = Snap::getSnapToken($params);

        // ✅ Kirim semua ke view
        return view('user/pembayaran/pembayaran', [
            'booking'   => $booking,
            'layanan'   => $layanan, // kirim data layanan lengkap
            'harga'     => $harga,
            'snapToken' => $snapToken,
            'clientKey' => $midtrans->clientKey
        ]);
    }
}
