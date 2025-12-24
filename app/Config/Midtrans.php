<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Midtrans extends BaseConfig
{
    public $serverKey = 'SB-Mid-server-qlVUvy1KgvjG8rPvpd5h7LR0'; // Ganti dengan SERVER_KEY sandbox
    public $clientKey = 'SB-Mid-client-hDlJwYihb866KFks'; // Ganti dengan CLIENT_KEY sandbox
    public $isProduction = false; // true jika sudah live
    public $isSanitized = true;
    public $is3ds = true;
}
