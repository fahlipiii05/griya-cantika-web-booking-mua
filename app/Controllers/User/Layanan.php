<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\LayananModel;

class Layanan extends BaseController
{
    protected $layananModel;

    public function __construct()
    {
        $this->layananModel = new LayananModel();
    }

    public function detail($id)
    {
        $layanan = $this->layananModel->find($id);

        if (!$layanan) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Layanan tidak ditemukan');
        }

        return view('user/layanan/detail', ['layanan' => $layanan]);
    }
}
