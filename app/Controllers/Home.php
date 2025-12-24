<?php

namespace App\Controllers;

use App\Models\LayananModel;

class Home extends BaseController
{
    public function index()
    {
        // Ambil data layanan dari database
        $layananModel = new LayananModel();
        $data['layanan'] = $layananModel->findAll();

        // Tambahkan title
        $data['title'] = 'Beranda - Griya Cantika MUA';

        // Kirim ke view beranda
        return view('user/dashboard', $data);
    }
}
