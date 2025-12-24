<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BookingModel;
use App\Models\LayananModel;

class Booking extends BaseController
{
    protected $bookingModel;

    public function __construct()
    {
        $this->bookingModel = new BookingModel();
    }

    // 📌 Menampilkan semua data booking (dengan nama layanan)
    public function index()
    {
        $db = \Config\Database::connect();

        // ✅ Ambil data booking + join layanan agar tampil nama layanan
        $builder = $db->table('bookings');
        $builder->select('bookings.*, layanan.nama AS service_name');
        $builder->join('layanan', 'layanan.id = bookings.service_id', 'left');
        $builder->orderBy('bookings.created_at', 'DESC');

        $query = $builder->get();
        $data['bookings'] = $query->getResultArray();

        // Kalau service_id berupa teks (bukan angka), tampilkan langsung
        foreach ($data['bookings'] as &$b) {
            if (!is_numeric($b['service_id']) && empty($b['service_name'])) {
                $b['service_name'] = $b['service_id'];
            }
        }

        return view('admin/bookings/index', $data);
    }

    // 📌 Form Tambah Booking
    public function create()
    {
        $layananModel = new LayananModel();
        $data['services'] = $layananModel->findAll(); // ambil semua layanan untuk dropdown
        return view('admin/bookings/create', $data);
    }

    // 📤 Simpan Booking Baru
    public function store()
    {
        $this->bookingModel->save([
            'client_name' => $this->request->getPost('client_name'),
            'email'       => $this->request->getPost('email'),
            'phone'       => $this->request->getPost('phone'),
            'address'     => $this->request->getPost('address'),
            'date'        => $this->request->getPost('date'),
            'time'        => $this->request->getPost('time'),
            'service_id'  => $this->request->getPost('service_id'),
            'status'      => 'pending'
        ]);

        return redirect()->to('/admin/booking')->with('success', 'Booking baru berhasil ditambahkan.');
    }

    // 📌 Form Edit Booking
    public function edit($id)
    {
        $data['booking'] = $this->bookingModel->find($id);

        if (!$data['booking']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Data booking dengan ID $id tidak ditemukan.");
        }

        // Ambil semua layanan untuk dropdown
        $layananModel = new LayananModel();
        $data['services'] = $layananModel->findAll();

        return view('admin/bookings/edit', $data);
    }

    // 📤 Proses Update Booking
    public function update($id)
    {
        $this->bookingModel->update($id, [
            'client_name' => $this->request->getPost('client_name'),
            'email'       => $this->request->getPost('email'),
            'phone'       => $this->request->getPost('phone'),
            'address'     => $this->request->getPost('address'),
            'date'        => $this->request->getPost('date'),
            'time'        => $this->request->getPost('time'),
            'service_id'  => $this->request->getPost('service_id'),
            'status'      => $this->request->getPost('status')
        ]);

        return redirect()->to('/admin/booking')->with('success', 'Booking berhasil diperbarui.');
    }

    // 🗑️ Hapus Booking
    public function delete($id)
    {
        $this->bookingModel->delete($id);
        return redirect()->to('/admin/booking')->with('success', 'Booking berhasil dihapus.');
    }

    // 🔁 Update Status Booking dari Dropdown
    public function updateStatus($id)
    {
        $status = $this->request->getPost('status');
        $this->bookingModel->update($id, ['status' => $status]);

        return redirect()->to('/admin/booking')->with('success', 'Status booking berhasil diperbarui.');
    }

    // 📋 Detail Booking
    public function detail($id)
    {
        $order = $this->bookingModel->where('id', $id)->first();

        if (!$order) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Data booking dengan ID $id tidak ditemukan.");
        }

        // Ambil data layanan untuk tampilkan detail layanan di halaman detail
        $layananModel = new LayananModel();
        $layanan = $layananModel->find($order['service_id']);
        $order['service_name'] = $layanan['nama'] ?? $order['service_id'] ?? 'Tidak diketahui';

        return view('admin/bookings/detail', ['order' => $order]);
    }
}
