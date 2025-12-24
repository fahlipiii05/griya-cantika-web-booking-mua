<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    // ✅ Tampilkan daftar user
    public function index()
    {
        $data['users'] = $this->userModel->findAll();
        return view('admin/user/index', $data);
    }

    // ✅ Form tambah user
    public function create()
    {
        return view('admin/user/create');
    }

    // ✅ Simpan user baru
    public function store()
    {
        $password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);

        $this->userModel->save([
            'name'     => $this->request->getPost('name'),
            'email'    => $this->request->getPost('email'),
            'password' => $password,
            'role'     => $this->request->getPost('role')
        ]);

        return redirect()->to('/admin/user')->with('success', 'User berhasil ditambahkan!');
    }

    // ✅ Form edit user
    public function edit($id)
    {
        $data['user'] = $this->userModel->find($id);
        return view('admin/user/edit', $data);
    }

    // ✅ Update user
    public function update($id)
    {
        $data = [
            'name'  => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'role'  => $this->request->getPost('role')
        ];

        // Hanya update password jika diisi
        if ($this->request->getPost('password')) {
            $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        }

        $this->userModel->update($id, $data);
        return redirect()->to('/admin/user')->with('success', 'User berhasil diperbarui!');
    }

    // ✅ Hapus user
    public function delete($id)
    {
        $this->userModel->delete($id);
        return redirect()->to('/admin/user')->with('success', 'User berhasil dihapus!');
    }
}
