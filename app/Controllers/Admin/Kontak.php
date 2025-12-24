<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KontakModel;

class Kontak extends BaseController
{
    public function index()
    {
        $kontakModel = new KontakModel();
        $kontak = $kontakModel->first();

        return view('admin/kontak/index', ['kontak' => $kontak]);
    }

    public function update()
    {
        $kontakModel = new KontakModel();
        $data = [
            'alamat'    => $this->request->getPost('alamat'),
            'telepon'   => $this->request->getPost('telepon'),
            'email'     => $this->request->getPost('email'),
            'instagram' => $this->request->getPost('instagram'),
            'tiktok'    => $this->request->getPost('tiktok'),
            'whatsapp'  => $this->request->getPost('whatsapp'),
            'maps_link' => $this->request->getPost('maps_link'),
            'deskripsi' => $this->request->getPost('deskripsi')
        ];

        if ($kontakModel->first()) {
            $kontakModel->update(1, $data);
        } else {
            $kontakModel->insert($data);
        }

        return redirect()->to(base_url('admin/kontak/'))->with('success', 'Kontak berhasil diperbarui!');
    }
}
