<?php

namespace App\Controllers\Owner;

use App\Controllers\BaseController;
use App\Models\BookingModel;
use App\Models\PaymentModel;
use Dompdf\Dompdf;
use Dompdf\Options;

class Laporan extends BaseController
{
    // 📘 LAPORAN BOOKING
    public function booking()
    {
        $db = \Config\Database::connect();

        $startDate = $this->request->getGet('start_date');
        $endDate   = $this->request->getGet('end_date');

        $builder = $db->table('bookings');
        $builder->select('*');
        if ($startDate && $endDate) {
            $builder->where('date >=', $startDate);
            $builder->where('date <=', $endDate);
        }
        $builder->orderBy('date', 'DESC');
        $query = $builder->get();

        return view('owner/laporan_booking', [
            'bookings' => $query->getResultArray(),
            'start_date' => $startDate,
            'end_date'   => $endDate
        ]);
    }

    // 💰 LAPORAN PENDAPATAN
    public function pendapatan()
    {
        $db = \Config\Database::connect();

        $startDate = $this->request->getGet('start_date');
        $endDate   = $this->request->getGet('end_date');

        $builder = $db->table('payments');
        $builder->select('payments.*, bookings.client_name, bookings.service_id, bookings.date');
        $builder->join('bookings', 'bookings.id = payments.booking_id', 'left');
        $builder->where('payments.status', 'success');

        if ($startDate && $endDate) {
            $builder->where('payments.payment_time >=', $startDate . ' 00:00:00');
            $builder->where('payments.payment_time <=', $endDate . ' 23:59:59');
        }

        $builder->orderBy('payments.payment_time', 'DESC');
        $query = $builder->get();

        $data = $query->getResultArray();

        $totalPendapatan = 0;
        foreach ($data as $row) {
            $totalPendapatan += (int)$row['gross_amount'];
        }

        return view('owner/laporan_pendapatan', [
            'pembayaran' => $data,
            'total' => $totalPendapatan,
            'start_date' => $startDate,
            'end_date'   => $endDate
        ]);
    }

    // 🧾 EXPORT LAPORAN PENDAPATAN KE PDF
    public function exportPdf()
{
    $db = \Config\Database::connect();

    $start_date = $this->request->getGet('start_date') ?? date('Y-m-01');
    $end_date   = $this->request->getGet('end_date') ?? date('Y-m-t');

    // Ambil data pembayaran + bookings
    $builder = $db->table('payments');
    $builder->select('
        payments.*,
        bookings.client_name,
        bookings.service_id,
        bookings.date AS booking_date
    ');
    $builder->join('bookings', 'bookings.id = payments.booking_id', 'left');

    // Filter status sukses/settlement/capture
    $builder->groupStart()
            ->where('payments.status', 'success')
            ->orWhere('payments.status', 'settlement')
            ->orWhere('payments.status', 'capture')
            ->groupEnd();

    // Filter tanggal
    if ($start_date && $end_date) {
        $builder->where('payments.payment_time >=', $start_date . ' 00:00:00');
        $builder->where('payments.payment_time <=', $end_date . ' 23:59:59');
    }

    $builder->orderBy('payments.payment_time', 'DESC');
    $pembayaran = $builder->get()->getResultArray();

    // 🔧 Fix: ambil nama layanan jika service_id berupa angka
    $layananModel = new \App\Models\LayananModel();
    foreach ($pembayaran as &$p) {
        if (is_numeric($p['service_id'])) {
            $layanan = $layananModel->find($p['service_id']);
            $p['service_name'] = $layanan ? $layanan['nama'] : '-';
        } else {
            $p['service_name'] = $p['service_id']; // langsung pakai teks
        }
    }

    // Hitung total
    $total = array_sum(array_column($pembayaran, 'gross_amount'));

    // Load view PDF
    $html = view('owner/pdf_pendapatan', [
        'pembayaran' => $pembayaran,
        'total'      => $total,
        'start_date' => $start_date,
        'end_date'   => $end_date
    ]);

    // Render PDF
    $options = new Options();
    $options->set('isHtml5ParserEnabled', true);
    $options->set('isRemoteEnabled', true);

    $dompdf = new Dompdf($options);
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $dompdf->stream('laporan_pendapatan.pdf', ['Attachment' => true]);
}



    // 📘 EXPORT LAPORAN BOOKING KE PDF
    public function exportPdfBooking()
    {
        $start_date = $this->request->getGet('start_date') ?? date('Y-m-01');
        $end_date   = $this->request->getGet('end_date') ?? date('Y-m-t');

        $db = \Config\Database::connect();
        $builder = $db->table('bookings');
        $builder->select('*');
        if ($start_date && $end_date) {
            $builder->where('date >=', $start_date);
            $builder->where('date <=', $end_date);
        }
        $builder->orderBy('date', 'DESC');
        $query = $builder->get();
        $bookings = $query->getResultArray();

        $html = view('owner/pdf_booking', [
            'bookings' => $bookings,
            'start_date' => $start_date,
            'end_date'   => $end_date
        ]);

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('laporan_booking.pdf', ['Attachment' => true]);
    }
}
