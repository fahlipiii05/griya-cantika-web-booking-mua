<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\LayananModel;

class Layanan extends BaseController
{
    protected $layananModel;

    public function __construct()
    {
        // ✅ Inisialisasi model
        $this->layananModel = new LayananModel();
    }

    // ==============================
    // 🛠️ UPDATE LAYANAN
    // ==============================
    public function update($id)
    {
        // ✅ Ambil data berdasarkan ID
        $layanan = $this->layananModel->find($id);

        if (!$layanan) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Layanan tidak ditemukan");
        }

        // ✅ Ambil gambar dari input
        $gambar = $this->request->getFile('gambar');
        $namaGambar = $layanan['gambar'];

        // ✅ Jika ada gambar baru, simpan & ganti
        if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
            $namaGambar = $gambar->getRandomName();
            $gambar->move('uploads/layanan', $namaGambar);
        }

        // ✅ Update data ke database
        $this->layananModel->update($id, [
            'nama'       => $this->request->getPost('nama'),
            'deskripsi'  => $this->request->getPost('deskripsi'),
            'harga'      => $this->request->getPost('harga'),
            'slug'       => url_title($this->request->getPost('nama'), '-', true),
            'gambar'     => $namaGambar
        ]);

        // ✅ Redirect ke halaman detail setelah update
        return redirect()->to('/admin/layanan/detail/' . $id)
                         ->with('success', 'Detail layanan berhasil diperbarui!');
    }
}
