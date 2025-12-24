<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PaymentModel;
use App\Models\BookingModel;
use App\Models\LayananModel;

class Pembayaran extends BaseController
{
    protected $paymentModel;

    public function __construct()
    {
        $this->paymentModel = new PaymentModel();
    }

    // 📄 Halaman daftar pembayaran
    public function index()
    {
        $payments = $this->paymentModel
            ->select('payments.*, bookings.client_name, layanan.nama AS service_name')
            ->join('bookings', 'bookings.id = payments.booking_id')
            ->join('layanan', 'layanan.id = bookings.service_id', 'left')
            ->orderBy('payment_time', 'DESC')
            ->findAll();

        return view('admin/pembayaran/index', ['payments' => $payments]);
    }

    // ➕ Form tambah pembayaran
    public function create()
    {
        $bookingModel = new BookingModel();
        $layananModel = new LayananModel();

        $bookings = $bookingModel->select('id, client_name, service_id')->findAll();
        $services = $layananModel->select('id, nama')->findAll();

        return view('admin/pembayaran/create', [
            'bookings' => $bookings,
            'services' => $services
        ]);
    }

    // 📤 Simpan pembayaran baru
    public function store()
{
    $bookingId  = $this->request->getPost('booking_id');
    $serviceId  = $this->request->getPost('service_id');

    // ✅ Update service_id ke tabel bookings
    $bookingModel = new BookingModel();
    $bookingModel->update($bookingId, ['service_id' => $serviceId]);

    // ✅ Simpan data pembayaran
    $data = [
        'booking_id'    => $bookingId,
        'order_id'      => $this->request->getPost('order_id') ?? uniqid('ORD-'),
        'transaction_id'=> $this->request->getPost('transaction_id') ?? null,
        'payment_type'  => $this->request->getPost('payment_type'),
        'gross_amount'  => $this->request->getPost('gross_amount'),
        'status'        => $this->request->getPost('status'),
        'payment_time'  => $this->request->getPost('payment_time') ?? date('Y-m-d H:i:s'),
    ];

    if (!$this->paymentModel->insert($data)) {
        dd($this->paymentModel->errors()); // 🔍 tampilkan error jika insert gagal
    }

    return redirect()->to('/admin/pembayaran')->with('success', '✅ Pembayaran berhasil ditambahkan!');
}


    // ✏️ Form edit pembayaran
    // ✏️ Form edit pembayaran
// ✏️ Form edit pembayaran
public function edit($id)
{
    // ✅ Ambil data pembayaran + data booking + layanan
    $payment = $this->paymentModel
        ->select('payments.*, bookings.client_name, bookings.email, bookings.phone, bookings.address, bookings.service_id, layanan.nama AS service_name')
        ->join('bookings', 'bookings.id = payments.booking_id', 'left')
        ->join('layanan', 'layanan.id = bookings.service_id', 'left')
        ->where('payments.id', $id)
        ->first();

    if (!$payment) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('❌ Data pembayaran tidak ditemukan.');
    }

    $bookingModel = new BookingModel();
    $layananModel = new LayananModel();

    $bookings = $bookingModel->select('id, client_name, service_id')->findAll();
    $services = $layananModel->select('id, nama')->findAll();

    return view('admin/pembayaran/edit', [
        'payment'  => $payment,
        'bookings' => $bookings,
        'services' => $services
    ]);
}



    // 📤 Simpan hasil edit pembayaran
    public function update($id)
    {
        $bookingId  = $this->request->getPost('booking_id');
        $serviceId  = $this->request->getPost('service_id');

        // ✅ Update service_id ke tabel bookings
        $bookingModel = new BookingModel();
        $bookingModel->update($bookingId, ['service_id' => $serviceId]);

        // ✅ Update pembayaran
        $this->paymentModel->update($id, [
            'booking_id'    => $bookingId,
            'gross_amount'  => $this->request->getPost('gross_amount'),
            'payment_type'  => $this->request->getPost('payment_type'),
            'status'        => $this->request->getPost('status'),
            'payment_time'  => $this->request->getPost('payment_time'),
        ]);

        return redirect()->to('/admin/pembayaran')->with('success', '✅ Pembayaran berhasil diperbarui!');
    }

    // 🗑️ Hapus pembayaran
    public function delete($id)
    {
        $this->paymentModel->delete($id);
        return redirect()->to('/admin/pembayaran')->with('success', '🗑️ Data pembayaran berhasil dihapus!');
    }

    // 📋 Detail pembayaran
    public function detail($id)
    {
        $payment = $this->paymentModel
            ->select('payments.*, bookings.client_name, layanan.nama as service_name')
            ->join('bookings', 'bookings.id = payments.booking_id')
            ->join('layanan', 'layanan.id = bookings.service_id', 'left')
            ->find($id);

        if (!$payment) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('❌ Pembayaran tidak ditemukan.');
        }

        return view('admin/pembayaran/detail', ['payment' => $payment]);
    }

    // 🧾 Invoice pembayaran
    public function invoice($id)
    {
        $payment = $this->paymentModel
            ->select('payments.*, bookings.client_name, bookings.email, bookings.phone, bookings.address, bookings.date, bookings.time, layanan.nama as service_name, layanan.harga')
            ->join('bookings', 'bookings.id = payments.booking_id')
            ->join('layanan', 'layanan.id = bookings.service_id', 'left')
            ->find($id);

        if (!$payment) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('❌ Pembayaran tidak ditemukan.');
        }

        return view('admin/pembayaran/invoice', ['payment' => $payment]);
    }
}
