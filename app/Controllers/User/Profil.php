<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Profil extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $userId = session()->get('id');

        if (!$userId) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $user = $userModel->find($userId);

        return view('user/profil', ['user' => $user]);
    }

    public function update()
    {
        $userModel = new UserModel();
        $id = session()->get('id');

        // Ambil data utama dari form
        $data = [
            'name'    => $this->request->getPost('name'),
            'phone'   => $this->request->getPost('phone'),
            'address' => $this->request->getPost('address'), // ✅ ubah ke 'address'
        ];

        // Password logic
        $oldPassword     = $this->request->getPost('old_password');
        $newPassword     = $this->request->getPost('new_password');
        $confirmPassword = $this->request->getPost('confirm_password');

        if (!empty($oldPassword) || !empty($newPassword) || !empty($confirmPassword)) {
            $user = $userModel->find($id);

            // 1️⃣ Cek password lama
            if (!password_verify($oldPassword, $user['password'])) {
                return redirect()->back()->with('error', '❌ Password lama salah.');
            }

            // 2️⃣ Cek kecocokan password baru
            if ($newPassword !== $confirmPassword) {
                return redirect()->back()->with('error', '❌ Konfirmasi password tidak cocok.');
            }

            // 3️⃣ Simpan password baru
            $data['password'] = password_hash($newPassword, PASSWORD_DEFAULT);
        }

        // ✅ Update data user
        $userModel->update($id, $data);

        // Perbarui nama di session
        session()->set('name', $data['name']);

        return redirect()->to(base_url('user/profil'))->with('success', '✅ Profil berhasil diperbarui!');
    }
}
