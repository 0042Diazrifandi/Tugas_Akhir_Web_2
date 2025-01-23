<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PegawaiModel;
use App\Models\DataGajiModel;
use App\Models\DataAbsensiModel;

class Karyawan extends BaseController
{
    protected $pegawaiModel;
    protected $dataGajiModel;
    protected $dataAbsensiModel;
    public function __construct()
    {
        $this->pegawaiModel = new PegawaiModel();
        $this->dataGajiModel = new DataGajiModel();
        $this->dataAbsensiModel = new DataAbsensiModel();
    }

    public function index()
    {
        // Ambil ID pegawai dari session
        $idPegawai = session()->get('id_pegawai');

        // Pastikan session ID pegawai ada
        if (!$idPegawai) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Ambil data pegawai dari database
        $pegawai = $this->pegawaiModel->getPegawaiById($idPegawai);

        // Cek apakah data pegawai ditemukan
        if (!$pegawai) {
            log_message('error', 'Pegawai dengan ID ' . $idPegawai . ' tidak ditemukan.');
            return redirect()->to('/login')->with('error', 'Data pegawai tidak ditemukan.');
        }

        $data = [
            'title' => 'Dashboard',
            'pegawai' => $pegawai,
            'totalKaryawan' => $this->pegawaiModel->countKaryawan(),
            'totalAdmin' => $this->pegawaiModel->countAdmin(),
            'totalJabatan' => $this->pegawaiModel->countJabatan(),
            'totalKehadiran' => $this->pegawaiModel->countKehadiran(),
        ];

        return view('Karyawan/dashboard', $data);
    }

    public function dataGaji()
    {
        $idPegawai = session()->get('id_pegawai');
        if (!$idPegawai) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $dataGaji = $this->dataGajiModel->getGajiByPegawai($idPegawai);

        return view('Karyawan/dataGaji/index', [
            'title' => 'Data Gaji',
            'gaji' => $dataGaji,
        ]);
    }

    public function dataAbsensi()
    {
        $idPegawai = session()->get('id_pegawai');
        if (!$idPegawai) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $dataAbsensi = $this->dataAbsensiModel->getAbsensiByPegawai($idPegawai);

        return view('Karyawan/dataAbsensi/index', [
            'title' => 'Data Absensi',
            'absensi' => $dataAbsensi,
        ]);
    }
}
