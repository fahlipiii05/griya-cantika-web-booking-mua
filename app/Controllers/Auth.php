<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    protected $session;
    protected $userModel;

    public function __construct()
{
    helper(['form', 'url']);
    $this->session = session();
    $this->userModel = new UserModel();
}
    // ======== LOGIN ========
    public function login()
    {
        return view('auth/login');
    }

    public function loginAuth()
    {
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $user = $this->userModel->where('email', $email)->first();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $this->session->set([
                    'id'        => $user['id'],
                    'name'      => $user['name'],
                    'email'     => $user['email'],
                    'role'      => $user['role'], // ✅ Tambahkan baris ini
                    'logged_in' => true
                ]);
            
                if ($user['role'] === 'owner') {
                    return redirect()->to('owner/dashboard');
                } elseif ($user['role'] === 'admin') {
                    return redirect()->to('admin/dashboard');
                } else {
                    return redirect()->to('user/dashboard');
                }
            
            } else {
                $this->session->setFlashdata('msg', 'Password salah.');
            }
        } else {
            $this->session->setFlashdata('msg', 'Email tidak ditemukan.');
        }
        return redirect()->to('/login');
    }

    public function logout()
{
    // Hapus semua data session login
    session()->destroy();

    // Redirect ke beranda (bukan ke /login)
    return redirect()->to('/')->with('success', 'Anda telah logout.');
}


    // ======== REGISTER ========
    public function register()
    {
        return view('auth/register');
    }

    public function store()
{
    $email = $this->request->getVar('email');
    $existingUser = $this->userModel->where('email', $email)->first();

    if ($existingUser) {
        $this->session->setFlashdata('msg', 'Email sudah digunakan.');
        return redirect()->to('/register');
    }

    $data = [
        'name'     => $this->request->getVar('name'),
        'email'    => $email,
        'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
        'phone'    => $this->request->getVar('phone'),     // ✅ Nomor telepon
        'address'  => $this->request->getVar('address'),   // ✅ Alamat
        'role'     => 'user' // default user biasa
    ];

    $this->userModel->save($data);
    $this->session->setFlashdata('msg', 'Akun berhasil dibuat! Silakan login.');
    return redirect()->to('/login');
}

    // ======== LUPA PASSWORD ========
    public function forgotPassword()
    {
        return view('auth/forgot_password');
    }

    public function sendResetLink()
    {
        $email = $this->request->getVar('email');
        $user  = $this->userModel->where('email', $email)->first();

        if ($user) {
            // Simulasi kirim email
            $this->session->setFlashdata('msg', 'Link reset password telah dikirim ke email (simulasi).');
        } else {
            $this->session->setFlashdata('msg', 'Email tidak ditemukan.');
        }

        return redirect()->to('/forgot-password');
    }

    public function resetPassword()
    {
        return view('auth/reset_password');
    }

    public function updatePassword()
    {
        $email = $this->request->getVar('email');
        $newPass = $this->request->getVar('password');
        $user = $this->userModel->where('email', $email)->first();

        if ($user) {
            $this->userModel->update($user['id'], [
                'password' => password_hash($newPass, PASSWORD_DEFAULT)
            ]);
            $this->session->setFlashdata('msg', 'Password berhasil diubah! Silakan login.');
            return redirect()->to('/login');
        } else {
            $this->session->setFlashdata('msg', 'Email tidak ditemukan.');
            return redirect()->to('/reset-password');
        }
    }
}
