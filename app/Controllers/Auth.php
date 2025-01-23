<?php

namespace App\Controllers;

use App\Models\PegawaiModel;

class Auth extends BaseController
{
    protected $pegawaiModel;

    public function __construct()
    {
        $this->pegawaiModel = new PegawaiModel();
    }

    public function index()
    {
        return view('login');
    }

    public function login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Cari pengguna berdasarkan username
        $user = $this->pegawaiModel->getUserByUsername($username);

        if ($user) {
            // Verifikasi password
            if (password_verify($password, $user['password'])) {
                // Set session
                session()->set([
                    'id_pegawai' => $user['id_pegawai'],
                    'nama_pegawai' => $user['nama_pegawai'],
                    'hak_akses' => $user['hak_akses'], // Role yang disimpan dalam session
                    'logged_in' => true
                ]);

                // Cek role dan redirect ke halaman yang sesuai
                if ($user['hak_akses'] == 'admin') {
                    return redirect()->to('Admin/dashboard'); // Redirect ke dashboard admin
                } elseif ($user['hak_akses'] == 'karyawan') {
                    return redirect()->to('Karyawan/dashboard'); // Redirect ke dashboard karyawan
                } else {
                    session()->destroy();
                    return redirect()->to('/')->with('error', 'Akses tidak valid.');
                }
            } else {
                // Password salah
                return redirect()->back()->with('error', 'Password salah.');
            }
        } else {
            // Username tidak ditemukan
            return redirect()->back()->with('error', 'Username tidak ditemukan.');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
