<?php

namespace App\Controllers;

use App\Models\PegawaiModel;

class AbsensiController extends BaseController
{
    protected $pegawaiModel;

    public function __construct()
    {
        $this->pegawaiModel = new PegawaiModel();
    }

    // Menampilkan data absensi
    public function index()
{
    // Ambil data pegawai beserta nama jabatan
    $dataPegawai = $this->pegawaiModel->getAllPegawai();

    // Ambil data absensi dari session
    $absensi = session()->get('absensi') ?? [];

    // Gabungkan data pegawai dengan data absensi dari session
    foreach ($dataPegawai as &$pegawai) {
        if (isset($absensi[$pegawai['nik']])) {
            $pegawai['status_kehadiran'] = $absensi[$pegawai['nik']]['status_kehadiran'];
            $pegawai['tanggal_kehadiran'] = $absensi[$pegawai['nik']]['tanggal_kehadiran'];
        } else {
            $pegawai['status_kehadiran'] = 'Belum Diinput';
            $pegawai['tanggal_kehadiran'] = date('Y-m-d');
        }
    }

    $data = [
        'title' => 'Data Absensi',
        'pegawai' => $dataPegawai,
    ];

    return view('Admin/dataAbsensi/index', $data);
}

    // Menampilkan form input absensi
    public function input()
    {
        $data = [
            'title' => 'Input Absensi',
        ];

        return view('Admin/dataAbsensi/input', $data);
    }

    // Menyimpan absensi ke session
    public function simpan()
{
    $rules = [
        'nik' => 'required',
        'status_kehadiran' => 'required',
        'tanggal_kehadiran' => 'required|valid_date',
    ];

    if (!$this->validate($rules)) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    // Ambil data dari form
    $nik = $this->request->getPost('nik');
    $statusKehadiran = $this->request->getPost('status_kehadiran');
    $tanggalKehadiran = $this->request->getPost('tanggal_kehadiran');

    // Ambil data absensi dari session
    $absensi = session()->get('absensi') ?? [];

    // Simpan data absensi ke session
    $absensi[$nik] = [
        'status_kehadiran' => $statusKehadiran,
        'tanggal_kehadiran' => $tanggalKehadiran,
    ];

    // Update session
    session()->set('absensi', $absensi);

    return redirect()->to('/absensi')->with('success', 'Data absensi berhasil disimpan.');
}
}