<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PegawaiModel;

class Login extends Controller
{
    public function index()
    {
        return view('logain');
    }

    public function authenticate()
{
    $session = session();
    $model = new PegawaiModel();

    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password');

    // Retrieve the user by username
    $pegawai = $model->where('username', $username)->first();

    if ($pegawai && password_verify($password, $pegawai['password'])) {
        // Password matches, set session and redirect
        $session->set('logged_in', true);
        $session->set('id_pegawai', $pegawai['id_pegawai']);
        $session->set('nama_pegawai', $pegawai['nama_pegawai']);
        return redirect()->to('/dashboard');
    } else {
        // Invalid login
        $session->setFlashdata('error', 'Invalid username or password');
        return redirect()->to('/login');
    }
}


    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}
