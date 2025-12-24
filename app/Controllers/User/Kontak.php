<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\KontakModel;

class Kontak extends BaseController
{
    public function index()
    {
        $kontakModel = new KontakModel();
        $kontak = $kontakModel->first(); // ambil baris pertama (sistemmu pakai satu row kontak)

        // jika tidak ada data, set default kosong agar view aman
        if (!$kontak) {
            $kontak = [
                'alamat'    => null,
                'telepon'   => null,
                'email'     => null,
                'instagram' => null,
                'tiktok'    => null,
                'whatsapp'  => null,
                'maps_link' => null,
            ];
        }

        return view('user/kontak', ['kontak' => $kontak]);
    }
}
