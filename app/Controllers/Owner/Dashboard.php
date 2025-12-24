<?php

namespace App\Controllers\Owner;

use App\Controllers\BaseController;
use App\Models\BookingModel;
use App\Models\PaymentModel;
use App\Models\UserModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $bookingModel = new BookingModel();
        $paymentModel = new PaymentModel();
        $userModel = new UserModel();

        // Hitung total data
        $totalBookings   = $bookingModel->countAllResults();
        $totalPendapatan = $paymentModel->where('status', 'success')->selectSum('gross_amount')->first()['gross_amount'] ?? 0;
        $totalUsers      = $userModel->countAllResults();

        // Ambil data grafik pendapatan per bulan
        $grafikPendapatan = $paymentModel
            ->select("MONTH(payment_time) as bulan, SUM(gross_amount) as total")
            ->where('status', 'success')
            ->groupBy('MONTH(payment_time)')
            ->orderBy('bulan', 'ASC')
            ->findAll();

        return view('owner/dashboard', [
            'totalBookings' => $totalBookings,
            'totalPendapatan' => $totalPendapatan,
            'totalUsers' => $totalUsers,
            'grafikPendapatan' => $grafikPendapatan
        ]);
    }

    public function laporanBooking()
    {
        $bookingModel = new BookingModel();
        $bookings = $bookingModel->orderBy('date', 'DESC')->findAll();
        return view('owner/laporan_booking', ['bookings' => $bookings]);
    }

    public function laporanPendapatan()
    {
        $paymentModel = new PaymentModel();
        $pendapatan = $paymentModel->where('status', 'success')->orderBy('payment_time', 'DESC')->findAll();
        return view('owner/laporan_pendapatan', ['pendapatan' => $pendapatan]);
    }
}
