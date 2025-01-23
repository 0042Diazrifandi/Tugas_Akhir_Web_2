<?php

namespace App\Controllers;

use App\Models\JabatanModel;
use App\Models\PegawaiModel;

class MasterDataController extends BaseController
{
    public function dataJabatan()
    {
        // Load model
        $jabatanModel = new JabatanModel();

        // Ambil data jabatan dari database
        $data['jabatan'] = $jabatanModel->findAll();

        // Tampilkan view
        return view('Admin/dataJabatan/index', $data);
    }
    public function createJabatan()
    {
        // Load model Pegawai
        $pegawaiModel = new PegawaiModel();
    
        // Ambil data pegawai dari database
        $data['pegawai'] = $pegawaiModel->findAll();
    
        // Tampilkan view form tambah data jabatan
        return view('Admin/dataJabatan/create', $data);
    }

public function storeJabatan()
{
    // Validasi input
    $rules = [
        'nama_jabatan' => 'required',
        'gaji_pokok' => 'required',
        'tj_transpot' => 'required',
        'uang_makan' => 'required',
        'alpha' => 'required|numeric',
        'id_pegawai' => 'required|numeric', // Pastikan id_pegawai diisi
    ];

    if (!$this->validate($rules)) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    // Simpan data ke database
    $jabatanModel = new JabatanModel();
    $jabatanModel->save([
        'nama_jabatan' => $this->request->getPost('nama_jabatan'),
        'gaji_pokok' => $this->request->getPost('gaji_pokok'),
        'tj_transpot' => $this->request->getPost('tj_transpot'),
        'uang_makan' => $this->request->getPost('uang_makan'),
        'alpha' => $this->request->getPost('alpha'),
        'id_pegawai' => $this->request->getPost('id_pegawai'), // Simpan id_pegawai
    ]);

    return redirect()->to('Admin/dataJabatan')->with('message', 'Data jabatan berhasil ditambahkan.');
}

public function editJabatan($id)
{
    // Ambil data jabatan berdasarkan ID
    $jabatanModel = new JabatanModel();
    $data['jabatan'] = $jabatanModel->find($id);

    if (!$data['jabatan']) {
        return redirect()->to('Admin/dataJabatan')->with('error', 'Data jabatan tidak ditemukan.');
    }

    // Tampilkan form edit
    return view('Admin/dataJabatan/edit', $data);
}

public function updateJabatan($id)
{
    // Validasi input
    $rules = [
        'nama_jabatan' => 'required',
        'gaji_pokok' => 'required|numeric',
        'tj_transpot' => 'required|numeric',
        'uang_makan' => 'required|numeric',
    ];

    if (!$this->validate($rules)) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    // Update data di database
    $jabatanModel = new JabatanModel();
    $jabatanModel->save([
        'id_jabatan' => $id,
        'nama_jabatan' => $this->request->getPost('nama_jabatan'),
        'gaji_pokok' => $this->request->getPost('gaji_pokok'),
        'tj_transpot' => $this->request->getPost('tj_transpot'),
        'uang_makan' => $this->request->getPost('uang_makan'),
    ]);

    return redirect()->to('Admin/dataJabatan')->with('message', 'Data jabatan berhasil diperbarui.');
}

public function deleteJabatan($id)
{
    // Hapus data dari database
    $jabatanModel = new JabatanModel();
    $jabatanModel->delete($id);

    return redirect()->to('Admin/dataJabatan')->with('message', 'Data jabatan berhasil dihapus.');
}
}