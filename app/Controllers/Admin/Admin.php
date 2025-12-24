<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BookingModel;
use App\Models\LayananModel;
use App\Models\PortfolioModel;
use App\Models\PaymentModel;

class Admin extends BaseController
{
    public function dashboard()
    {
        // ✅ 1. Total pesanan
        $bookingModel = new BookingModel();
        $total_pesanan = $bookingModel->countAllResults();

        // ✅ 2. Total layanan
        $layananModel = new LayananModel();
        $total_layanan = $layananModel->countAllResults();

        // ✅ 3. Total portfolio
        $portfolioModel = new PortfolioModel();
        $total_portfolio = $portfolioModel->countAllResults();

        // ✅ 4. Total pembayaran sukses
        $paymentModel = new PaymentModel();
        $total_pembayaran = $paymentModel
            ->where('status', 'success')
            ->selectSum('gross_amount')
            ->get()
            ->getRow()
            ->gross_amount ?? 0;

        // ✅ 5. Ringkasan pesanan berdasarkan status
        $pesanan_proses  = $bookingModel->where('status', 'pending')->countAllResults();
        $pesanan_selesai = $bookingModel->where('status', 'paid')->countAllResults();
        $pesanan_batal   = $bookingModel->where('status', 'cancelled')->countAllResults();

        // ✅ 6. Ambil 5 pembayaran terbaru
        $latest_payments = $paymentModel
            ->select('payments.*, bookings.client_name')
            ->join('bookings', 'bookings.id = payments.booking_id')
            ->orderBy('payment_time', 'DESC')
            ->limit(5)
            ->find();

        return view('admin/dashboard', [
            'total_pesanan'    => $total_pesanan,
            'total_layanan'    => $total_layanan,
            'total_portfolio'  => $total_portfolio,
            'total_pembayaran' => $total_pembayaran,
            'pesanan_proses'   => $pesanan_proses,
            'pesanan_selesai'  => $pesanan_selesai,
            'pesanan_batal'    => $pesanan_batal,
            'latest_payments'  => $latest_payments
        ]);
    }
}
