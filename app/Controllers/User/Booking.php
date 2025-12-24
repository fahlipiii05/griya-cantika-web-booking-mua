<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\LayananModel;
use App\Models\UserModel;

class Booking extends BaseController
{
    public function form()
    {
        // Ambil tanggal dari URL (?date=...)
        $date = $this->request->getGet('date');

        // Ambil semua layanan dari database
        $layananModel = new LayananModel();
        $layanan = $layananModel->findAll();

        // Ambil data user dari session (jika user login)
        $user = null;
        $userId = session()->get('id');
        if ($userId) {
            $userModel = new UserModel();
            $user = $userModel->find($userId);
        }

        // Kirim data ke view
        return view('user/booking-form', [
            'date'    => $date,
            'layanan' => $layanan,
            'user'    => $user
        ]);
    }
}
