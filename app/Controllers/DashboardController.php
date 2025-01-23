<?php

namespace App\Controllers;

use App\Models\PegawaiModel;

class DashboardController extends BaseController
{
    protected $pegawaiModel;

    public function __construct()
    {
        $this->pegawaiModel = new PegawaiModel();
    }

    /**
     * Menampilkan halaman dashboard.
     */
    public function index()
    {
        $data = [
            'title' => 'Dashboard', // Untuk digunakan di template
            'totalKaryawan' => $this->pegawaiModel->countKaryawan(),
            'totalAdmin' => $this->pegawaiModel->countAdmin(),
            'totalJabatan' => $this->pegawaiModel->countJabatan(),
            'totalKehadiran' => $this->pegawaiModel->countKehadiran(),
        ];

        return view('dashboard', $data);
    }
}
