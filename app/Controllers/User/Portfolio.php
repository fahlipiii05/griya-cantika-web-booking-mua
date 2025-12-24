<?php

namespace App\Controllers\User;

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
        // Ambil semua data dari DB
        $data['portfolio'] = $this->portfolioModel->findAll();
        return view('user/portfolio', $data);
    }
}
