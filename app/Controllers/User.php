<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LayananModel;

class User extends Controller
{
    // =======================
    // DASHBOARD (TANPA LOGIN)
    // =======================
    public function dashboard()
    {
        $layananModel = new LayananModel();
        $data['layanan'] = $layananModel->findAll();
        $data['title'] = 'Dashboard - Griya Cantika MUA';

        return view('user/dashboard', $data);
    }

    // =======================
    // PESAN LAYANAN (HARUS LOGIN)
    // =======================
    public function pesan()
    {
        $session = session();
        if (! $session->get('logged_in')) {
            return redirect()->to('/login')->with('error', 'Silakan login untuk memesan layanan.');
        }

        $layananModel = new LayananModel();
        $data['layanan'] = $layananModel->findAll();
        $data['title'] = 'Pesan Layanan - Griya Cantika MUA';

        return view('user/pesan', $data);
    }

    // =======================
    // LAYANAN (TANPA LOGIN)
    // =======================
    public function layanan()
{
    $layananModel = new \App\Models\LayananModel();
    $data['layanan'] = $layananModel->findAll();
    $data['title'] = 'Dashboard - Griya Cantika MUA';

    // Gunakan view dashboard karena di sana daftar layanan ditampilkan
    return view('user/dashboard', $data);
}

    

    // =======================
    // DETAIL LAYANAN (TANPA LOGIN)
    // =======================
    public function layananDetail($id)
    {
        $layananModel = new LayananModel();
        $layanan = $layananModel->find($id);

        if (! $layanan) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Layanan tidak ditemukan");
        }

        return view('user/layanan_detail', [
            'title'   => 'Detail Layanan - ' . $layanan['nama'],
            'layanan' => $layanan
        ]);
    }

    // =======================
    // PORTFOLIO (TANPA LOGIN)
    // =======================
    public function portfolio()
    {
        return view('user/portfolio', [
            'title' => 'Portfolio - Griya Cantika MUA'
        ]);
    }

    // =======================
    // KONTAK (TANPA LOGIN)
    // =======================
    public function kontak()
    {
        return view('user/kontak', [
            'title' => 'Kontak - Griya Cantika MUA'
        ]);
    }

    // =======================
    // API - GET BOOKINGS (HARUS LOGIN)
    // =======================
    public function getBookings()
    {
        $session = session();
        if (! $session->get('logged_in')) {
            return redirect()->to('/login')->with('error', 'Silakan login untuk melihat pesanan Anda.');
        }

        $db = db_connect();
        $builder = $db->table('bookings');
        $bookings = $builder->select('id, title, start, end, status')->get()->getResultArray();

        return $this->response->setJSON($bookings);
    }

    // =======================
    // API - SAVE BOOKING (HARUS LOGIN)
    // =======================
    public function saveBooking()
    {
        $session = session();
        if (! $session->get('logged_in')) {
            return redirect()->to('/login')->with('error', 'Silakan login untuk melakukan pemesanan.');
        }

        $db = db_connect();
        $data = [
            'title'  => $this->request->getPost('service'),
            'start'  => $this->request->getPost('date'),
            'status' => 'booked'
        ];

        $db->table('bookings')->insert($data);
        return redirect()->to('/user/pesan')->with('success', 'Booking berhasil dibuat!');
    }
}
