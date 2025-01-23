<?php

namespace App\Controllers;

use App\Models\PegawaiModel;

class Admin extends BaseController
{
    protected $pegawaiModel;

    public function __construct()
    {
        $this->pegawaiModel = new PegawaiModel();
    }

    public function index()
    {
        $data = [
            'totalKaryawan' => $this->pegawaiModel->countKaryawan(),
            'totalAdmin' => $this->pegawaiModel->countAdmin(),
            'totalJabatan' => $this->pegawaiModel->countJabatan(),
            'totalKehadiran' => $this->pegawaiModel->countKehadiran(),
        ];
        return view('Admin/dashboard', $data);
    }

    public function karyawan()
    {
        $data = [
            'karyawan' => $this->pegawaiModel->getAllPegawai()
        ];
        return view('Admin/dataKaryawan/index', $data);
    }

    // Halaman Create Pegawai
    public function create()
    {
        $jabatanModel = new \App\Models\JabatanModel();
        $data = [
            'title' => 'Tambah Pegawai',
            'jabatan' => $jabatanModel->findAll() // Fetch all jabatan
        ];
        return view('Admin/dataKaryawan/create', $data);
    }

    // Menyimpan Data Pegawai
    public function store()
    {
        $pegawaiModel = new PegawaiModel();

        // Handle file upload
        $photo = $this->request->getFile('photo');

        // Generate unique name for the photo to avoid conflicts
        $photoName = null;
        if ($photo && $photo->isValid() && !$photo->hasMoved()) {
            $photoName = $photo->getRandomName(); // Generate a random unique name
            $photo->move(FCPATH . 'uploads/', $photoName); // Move file to 'uploads' folder
        }

        $data = [
            'nik' => $this->request->getPost('nik'),
            'nama_pegawai' => $this->request->getPost('nama_pegawai'),
            'username' => $this->request->getPost('username'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'id_jabatan' => $this->request->getPost('id_jabatan'),
            'tanggal_masuk' => $this->request->getPost('tanggal_masuk'),
            'status' => $this->request->getPost('status'),
            'hak_akses' => $this->request->getPost('hak_akses'),
            'photo' => $photoName,
        ];
        $pegawaiModel->insert($data);
        return redirect()->to('/Admin/karyawan')->with('message', 'Data pegawai berhasil disimpan!');
    }


    // Halaman Edit Pegawai
    public function edit($id)
    {
        $pegawai = $this->pegawaiModel->find($id);
        if (!$pegawai) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Pegawai Tidak Ditemukan');
        }
        $jabatanModel = new \App\Models\JabatanModel();

        $data = [
            'title' => 'Edit Pegawai',
            'pegawai' => $pegawai,
            'jabatan' => $jabatanModel->findAll() // Fetch all jabatan

        ];

        return view('Admin/dataKaryawan/edit', $data);
    }

    // Update Data Pegawai
    public function update($id)
    {
        $pegawaiModel = new PegawaiModel();

        // Ambil file foto baru, jika ada
        $photo = $this->request->getFile('photo');
        $photoName = null;

        // Ambil data pegawai lama (untuk memproses penggantian foto)
        $pegawaiLama = $pegawaiModel->find($id);

        // Jika ada file foto baru yang valid
        if ($photo && $photo->isValid() && !$photo->hasMoved()) {
            $photoName = $photo->getRandomName(); // Buat nama unik
            $photo->move(FCPATH . 'uploads/', $photoName); // Simpan foto di folder uploads

            // Hapus foto lama jika ada
            if ($pegawaiLama['photo'] && file_exists(FCPATH . 'uploads/' . $pegawaiLama['photo'])) {
                unlink(FCPATH . 'uploads/' . $pegawaiLama['photo']);
            }
        } else {
            // Gunakan foto lama jika tidak ada foto baru diunggah
            $photoName = $pegawaiLama['photo'];
        }

        // Siapkan data untuk diupdate
        $data = [
            'nik' => $this->request->getPost('nik'),
            'nama_pegawai' => $this->request->getPost('nama_pegawai'),
            'username' => $this->request->getPost('username'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'id_jabatan' => $this->request->getPost('id_jabatan'),
            'tanggal_masuk' => $this->request->getPost('tanggal_masuk'),
            'status' => $this->request->getPost('status'),
            'hak_akses' => $this->request->getPost('hak_akses'),
            'photo' => $photoName,
        ];

        // Hash password jika diisi
        if ($this->request->getPost('password')) {
            $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        }

        // Update data pegawai
        $pegawaiModel->update($id, $data);

        return redirect()->to('/Admin/karyawan')->with('message', 'Data pegawai berhasil diperbarui!');
    }


    // Delete Data Pegawai
    public function delete($id)
    {
        $this->pegawaiModel->delete($id);
        return redirect()->to('/Admin/karyawan');
    }
}
