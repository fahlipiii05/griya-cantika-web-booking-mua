<?php

namespace App\Models;

use CodeIgniter\Model;

class PortfolioModel extends Model
{
    protected $table = 'portfolio'; // nama tabel di database
    protected $primaryKey = 'id';
    protected $allowedFields = ['judul', 'deskripsi', 'kategori', 'gambar'];
}
