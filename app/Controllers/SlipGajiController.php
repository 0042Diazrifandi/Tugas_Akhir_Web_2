<?php
// app/Controllers/SlipGajiController.php

namespace App\Controllers;

use App\Models\SlipGajiModel;

class SlipGajiController extends BaseController {
    private $slipGajiModel;

    public function __construct() {
        $this->slipGajiModel = new SlipGajiModel();
    }

    // Fungsi untuk menampilkan slip gaji
    public function tampilkanSlipGaji($id_pegawai, $bulan) {
        // Mengambil data pegawai
        $pegawai = $this->slipGajiModel->getPegawaiById($id_pegawai);
        if (!$pegawai) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Pegawai tidak ditemukan');
        }

        // Mengambil data jabatan
        $jabatan = $this->slipGajiModel->getJabatanById($pegawai['id_jabatan']);
        if (!$jabatan) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Jabatan tidak ditemukan');
        }

        // Mengambil data kehadiran
        $kehadiran = $this->slipGajiModel->getKehadiran($id_pegawai, $bulan);
        if (!$kehadiran) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data kehadiran tidak ditemukan');
        }

        // Mengambil data potongan gaji
        $potongan = $this->slipGajiModel->getPotonganGaji();
        
        // Menghitung total gaji
        $gaji_pokok = (int) $jabatan['gaji_pokok'];
        $tj_transport = (int) $jabatan['tj_transpot'];
        $uang_makan = (int) $jabatan['uang_makan'];

        // Menghitung potongan berdasarkan kehadiran
        $alpha = (int) $kehadiran['alpha'];
        $potongan_alpha = $alpha * (int) $jabatan['alpha'];

        // Total Gaji
        $total_gaji = $gaji_pokok + $tj_transport + $uang_makan - $potongan_alpha;

        // Mengirim data ke view
        return view('Admin/laporan/slipGaji', [
            'pegawai' => $pegawai,
            'jabatan' => $jabatan,
            'kehadiran' => $kehadiran,
            'potongan' => $potongan,
            'total_gaji' => $total_gaji
        ]);
    }
}
