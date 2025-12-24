<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class OwnerAuth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        // ✅ Cek login
        if (!$session->get('logged_in')) {
            return redirect()->to('/login')->with('msg', 'Silakan login terlebih dahulu.');
        }

        // ✅ Cek role owner
        if ($session->get('role') !== 'owner') {
            return redirect()->to('/user/dashboard')->with('msg', 'Akses ditolak. Hanya owner yang dapat mengakses halaman ini.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak perlu isi apa-apa
    }
}
