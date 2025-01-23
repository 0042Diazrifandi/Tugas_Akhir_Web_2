<?php

namespace App\Controllers;

use App\Models\PegawaiModel; // Import model PegawaiModel
use CodeIgniter\Controller;

class Controllerslogin extends BaseController
{
    protected $pegawaiModel;

    /**
     * Constructor
     */
    public function __construct()
    {
        // Inisialisasi PegawaiModel
        $this->pegawaiModel = new PegawaiModel();
    }

    /**
     * Menampilkan halaman login.
     *
     * @return string
     */
    public function login()
    {
        // Pastikan file view 'login.php' ada di app/Views/
        return view('logain');
    }

    /**
     * Memproses login pengguna.
     *
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function loginProcess()
    {
        // Ambil data dari form
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Validasi input
        if (!$username || !$password) {
            return redirect()->back()->with('error', 'Username dan Password harus diisi.');
        }

        // Cari pengguna berdasarkan username
        $pegawai = $this->pegawaiModel->getUserByUsername($username);

        if ($pegawai) {
            // Verifikasi password
            if (password_verify($password, $pegawai['password'])) {
                // Simpan data pengguna ke session
                session()->set([
                    'id' => $pegawai['id'],
                    'username' => $pegawai['username'],
                    'logged_in' => true,
                ]);

                // Redirect ke halaman dashboard
                return redirect()->to('dashboard');
            } else {
                return redirect()->back()->with('error', 'Password salah.');
            }
        } else {
            return redirect()->back()->with('error', 'Username tidak ditemukan.');
        }
    }

    /**
     * Logout pengguna.
     *
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function logout()
    {
        // Hapus semua data session
        session()->destroy();

        // Redirect ke halaman login
        return redirect()->to('/login');
    }
}
