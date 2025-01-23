<?php

namespace App\Controllers;

use App\Models\JabatanModel;
use App\Models\PegawaiModel;
use App\Models\PotonganGajiModel;

class LaporanGajiController extends BaseController
{
    public function index()
    {
        // Menampilkan laporan gaji tanpa filter
        $jabatanModel = new JabatanModel();
        $potonganModel = new PotonganGajiModel();
        $pegawaiModel = new PegawaiModel();

        $dataJabatan = $jabatanModel->findAll();
        $potongan = $potonganModel->findAll();
        $gajiData = $this->hitungGaji($dataJabatan, $potongan, $pegawaiModel);

        $data = [
            'title' => 'Laporan Gaji Karyawan',
            'gaji' => $gajiData,
            'bulan' => null,
            'tahun' => null,
            'cetak' => false,  // Menandakan bahwa ini bukan halaman cetak
        ];

        return view('/Admin/laporan/laporanGaji', $data);
    }

    public function filter()
    {
        // Filter laporan gaji berdasarkan bulan dan tahun
        $jabatanModel = new JabatanModel();
        $potonganModel = new PotonganGajiModel();
        $pegawaiModel = new PegawaiModel();

        $bulan = $this->request->getGet('bulan');
        $tahun = $this->request->getGet('tahun');

        $dataJabatan = $jabatanModel->findAll();
        $potongan = $potonganModel->findAll();
        $gajiData = $this->hitungGaji($dataJabatan, $potongan, $pegawaiModel);

        if (!empty($bulan) && !empty($tahun)) {
            $gajiData = array_filter($gajiData, function ($gaji) use ($bulan, $tahun) {
                return ($gaji['bulan'] == $bulan && $gaji['tahun'] == $tahun);
            });
        }

        $data = [
            'title' => 'Filter Laporan Gaji Karyawan',
            'gaji' => $gajiData,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'cetak' => false,  // Menandakan bahwa ini bukan halaman cetak
        ];

        return view('/Admin/laporan/laporanGaji', $data);
    }

    public function cetak()
    {
        // Cetak laporan berdasarkan bulan dan tahun
        $jabatanModel = new JabatanModel();
        $potonganModel = new PotonganGajiModel();
        $pegawaiModel = new PegawaiModel();

        $bulan = $this->request->getGet('bulan');
        $tahun = $this->request->getGet('tahun');

        $dataJabatan = $jabatanModel->findAll();
        $potongan = $potonganModel->findAll();
        $gajiData = $this->hitungGaji($dataJabatan, $potongan, $pegawaiModel);

        if (!empty($bulan) && !empty($tahun)) {
            $gajiData = array_filter($gajiData, function ($gaji) use ($bulan, $tahun) {
                return ($gaji['bulan'] == $bulan && $gaji['tahun'] == $tahun);
            });
        }

        $data = [
            'title' => 'Cetak Laporan Gaji Karyawan',
            'gaji' => $gajiData,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'cetak' => true,  // Menandakan bahwa ini halaman untuk cetak
        ];

        return view('/Admin/laporan/laporanGaji', $data);
    }

    private function hitungGaji($dataJabatan, $potongan, $pegawaiModel)
    {
        $gajiData = [];
        foreach ($dataJabatan as $jabatan) {
            $pegawai = $pegawaiModel->where('id_jabatan', $jabatan['id_jabatan'])->first();

            $alpha = $jabatan['alpha'] ?? 0;
            $jmlPotongan = 0;

            foreach ($potongan as $p) {
                if ($p['potongan'] === 'alpha') {
                    $jmlPotongan += $alpha * $p['jml_potongan'];
                }
            }

            $totalGaji = $jabatan['gaji_pokok'] + $jabatan['tj_transpot'] + $jabatan['uang_makan'] - $jmlPotongan;

            $gajiData[] = [
                'nik' => $pegawai['nik'] ?? '-',
                'nama_pegawai' => $pegawai['nama_pegawai'] ?? 'Tidak Diketahui',
                'jenis_kelamin' => $pegawai['jenis_kelamin'] ?? 'Tidak Diketahui',
                'jabatan' => $jabatan['nama_jabatan'],
                'gaji_pokok' => $jabatan['gaji_pokok'],
                'tj_transpot' => $jabatan['tj_transpot'],
                'uang_makan' => $jabatan['uang_makan'],
                'alpha' => $alpha,
                'potongan' => $jmlPotongan,
                'total_gaji' => $totalGaji,
                'bulan' => $jabatan['bulan'] ?? date('m'),
                'tahun' => $jabatan['tahun'] ?? date('Y'),
            ];
        }

        return $gajiData;
    }
}
