<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\LayananModel;

class Layanan extends BaseController
{
    protected $layananModel;

    public function __construct()
    {
        $this->layananModel = new LayananModel();
    }

    public function index()
    {
        $data['layanan'] = $this->layananModel->findAll();
        return view('admin/layanan/index', $data);
    }

    public function create()
    {
        return view('admin/layanan/create');
    }

    public function store()
    {
        $gambar = $this->request->getFile('gambar');
        $namaGambar = null;

        if ($gambar && $gambar->isValid()) {
            $namaGambar = $gambar->getRandomName();
            $gambar->move('uploads/layanan', $namaGambar);
        }

        $this->layananModel->save([
            'nama'       => $this->request->getPost('nama'),
            'deskripsi'  => $this->request->getPost('deskripsi'),
            'harga'      => $this->request->getPost('harga'),
            'slug'       => url_title($this->request->getPost('nama'), '-', true),
            'gambar'     => $namaGambar
        ]);

        return redirect()->to('/admin/layanan')->with('success', 'Layanan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data['layanan'] = $this->layananModel->find($id);
        return view('admin/layanan/edit', $data);
    }

    public function update($id)
    {
        $layanan = $this->layananModel->find($id);
        if (!$layanan) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Layanan tidak ditemukan");
        }

        $gambar = $this->request->getFile('gambar');
        $namaGambar = $layanan['gambar'];

        if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
            $namaGambar = $gambar->getRandomName();
            $gambar->move('uploads/layanan', $namaGambar);
        }

        $this->layananModel->update($id, [
            'nama'       => $this->request->getPost('nama'),
            'deskripsi'  => $this->request->getPost('deskripsi'),
            'harga'      => $this->request->getPost('harga'),
            'slug'       => url_title($this->request->getPost('nama'), '-', true),
            'gambar'     => $namaGambar
        ]);

        return redirect()->to('/admin/layanan/detail/' . $id)->with('success', 'Layanan berhasil diperbarui!');
    }

    public function delete($id)
    {
        $this->layananModel->delete($id);
        return redirect()->to('/admin/layanan')->with('success', 'Layanan berhasil dihapus!');
    }

    // ✅ DETAIL + EDIT
    public function detail($id)
    {
        $layanan = $this->layananModel->find($id);

        if (!$layanan) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Layanan tidak ditemukan");
        }

        return view('admin/layanan/detail', ['layanan' => $layanan]);
    }
}
