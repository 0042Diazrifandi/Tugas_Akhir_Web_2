<?php

namespace App\Controllers;

use App\Models\JabatanModel;
use App\Models\PegawaiModel;
use App\Models\PotonganGajiModel;

class GajiController extends BaseController
{
    public function index()
    {
        $jabatanModel = new JabatanModel();
        $potonganModel = new PotonganGajiModel();
        $pegawaiModel = new PegawaiModel();

        $dataJabatan = $jabatanModel->findAll();
        $potongan = $potonganModel->findAll();
        $gajiData = $this->hitungGaji($dataJabatan, $potongan, $pegawaiModel);

        $data = [
            'title' => 'Data Gaji Karyawan',
            'gaji' => $gajiData,
            'bulan' => null,
            'tahun' => null,
        ];

        return view('/Admin/dataGaji/index', $data);
    }

    public function filter()
    {
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
            'title' => 'Data Gaji Karyawan',
            'gaji' => $gajiData,
            'bulan' => $bulan,
            'tahun' => $tahun,
        ];

        return view('/Admin/dataGaji/index', $data);
    }

    public function cetak()
    {
        $jabatanModel = new JabatanModel();
        $potonganModel = new PotonganGajiModel();
        $pegawaiModel = new PegawaiModel();

        $dataJabatan = $jabatanModel->findAll();
        $potongan = $potonganModel->findAll();
        $gajiData = $this->hitungGaji($dataJabatan, $potongan, $pegawaiModel);

        $data = [
            'title' => 'Cetak Daftar Gaji',
            'gaji' => $gajiData,
        ];

        return view('/Admin/dataGaji/cetak', $data);
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
