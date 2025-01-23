<?php

namespace App\Controllers;

use App\Models\PotonganGajiModel;

class PotonganGajiController extends BaseController
{
    protected $potonganGajiModel;

    public function __construct()
    {
        $this->potonganGajiModel = new PotonganGajiModel();
    }

    // Menampilkan data potongan gaji
    public function index()
    {
        $data = [
            'title' => 'Setting Potongan Gaji',
            'potonganGaji' => $this->potonganGajiModel->findAll(),
        ];

        return view('Admin/potonganGaji/index', $data);
    }

    // Menampilkan form tambah potongan gaji
    public function tambah()
    {
        $data = [
            'title' => 'Tambah Potongan Gaji',
        ];

        return view('Admin/potonganGaji/tambah', $data);
    }

    // Menyimpan data potongan gaji
    public function simpan()
    {
        $rules = [
            'potongan' => 'required',
            'jml_potongan' => 'required|numeric',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'potongan' => $this->request->getPost('potongan'),
            'jml_potongan' => $this->request->getPost('jml_potongan'),
        ];

        $this->potonganGajiModel->save($data);

        return redirect()->to('/potongan-gaji')->with('success', 'Data potongan gaji berhasil disimpan.');
    }

    // Menampilkan form edit potongan gaji
    public function edit($id)
    {
        $data = [
            'title' => 'Edit Potongan Gaji',
            'potonganGaji' => $this->potonganGajiModel->find($id),
        ];

        return view('Admin/potonganGaji/edit', $data);
    }

    // Mengupdate data potongan gaji
    public function update($id)
    {
        $rules = [
            'potongan' => 'required',
            'jml_potongan' => 'required|numeric',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'id' => $id,
            'potongan' => $this->request->getPost('potongan'),
            'jml_potongan' => $this->request->getPost('jml_potongan'),
        ];

        $this->potonganGajiModel->save($data);

        return redirect()->to('/potongan-gaji')->with('success', 'Data potongan gaji berhasil diperbarui.');
    }

    // Menghapus data potongan gaji
    public function hapus($id)
    {
        $this->potonganGajiModel->delete($id);

        return redirect()->to('/potongan-gaji')->with('success', 'Data potongan gaji berhasil dihapus.');
    }
}