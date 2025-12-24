<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PortfolioModel;

class Portfolio extends BaseController
{
    protected $portfolioModel;

    public function __construct()
    {
        $this->portfolioModel = new PortfolioModel();
    }

    public function index()
    {
        $data['portfolio'] = $this->portfolioModel->findAll();
        return view('admin/portfolio/index', $data);
    }

    public function create()
    {
        return view('admin/portfolio/create');
    }

    public function store()
    {
        $gambar = $this->request->getFile('gambar');
        $namaGambar = null;

        if ($gambar && $gambar->isValid()) {
            $namaGambar = $gambar->getRandomName();
            $gambar->move('uploads/portfolio', $namaGambar);
        }

        $this->portfolioModel->save([
            'judul' => $this->request->getPost('judul'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'kategori' => $this->request->getPost('kategori'),
            'gambar' => $namaGambar
        ]);

        return redirect()->to('/admin/portfolio')->with('success', 'Portfolio berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data['portfolio'] = $this->portfolioModel->find($id);
        return view('admin/portfolio/edit', $data);
    }

    public function update($id)
    {
        $portfolio = $this->portfolioModel->find($id);
        $gambar = $this->request->getFile('gambar');
        $namaGambar = $portfolio['gambar'];

        if ($gambar && $gambar->isValid()) {
            $namaGambar = $gambar->getRandomName();
            $gambar->move('uploads/portfolio', $namaGambar);
        }

        $this->portfolioModel->update($id, [
            'judul' => $this->request->getPost('judul'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'kategori' => $this->request->getPost('kategori'),
            'gambar' => $namaGambar
        ]);

        return redirect()->to('/admin/portfolio')->with('success', 'Portfolio berhasil diperbarui!');
    }

    public function delete($id)
    {
        $this->portfolioModel->delete($id);
        return redirect()->to('/admin/portfolio')->with('success', 'Portfolio berhasil dihapus!');
    }
}
