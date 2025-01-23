<?php

namespace App\Controllers;

use App\Models\PegawaiModel;
use App\Models\DataKehadiranModel;
use App\Models\DataJabatanModel;
use App\Models\JabatanModel;
use App\Models\KehadiranModel;

class LaporanAbsensiController extends BaseController
{
    public function index()
    {
        $pegawaiModel = new PegawaiModel();
        $kehadiranModel = new KehadiranModel();
        $jabatanModel = new JabatanModel();

        // Ambil data pegawai dan kehadiran
        $pegawaiData = $pegawaiModel->findAll();
        $absensiData = [];

        foreach ($pegawaiData as $pegawai) {
            // Ambil data kehadiran berdasarkan id_pegawai
            $kehadiran = $kehadiranModel->where('id_pegawai', $pegawai['id_pegawai'])->first();
            $jabatan = $jabatanModel->where('id_jabatan', $pegawai['id_jabatan'])->first();

            $absensiData[] = [
                'nik' => $pegawai['nik'],
                'nama_pegawai' => $pegawai['nama_pegawai'],
                'jabatan' => $jabatan['nama_jabatan'] ?? 'Tidak Diketahui',
                'hadir' => $kehadiran['hadir'] ?? 0,
                'sakit' => $kehadiran['sakit'] ?? 0,
                'alpha' => $kehadiran['alpha'] ?? 0,
                'bulan' => $kehadiran['bulan'] ?? date('m'),
            ];
        }

        // Kirim data ke view
        $data = [
            'title' => 'Laporan Absensi Pegawai',
            'absensi' => $absensiData,
        ];

        return view('Admin/laporan/laporanAbsensi', $data);
    }
}
