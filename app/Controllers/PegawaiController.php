<?php

namespace App\Controllers;

use App\Models\PegawaiModel;
use App\Models\JabatanModel; // Menambahkan model jabatan
use CodeIgniter\Controller;

class PegawaiController extends Controller
{
    // Display the list of employees
    public function index()
    {
        $pegawaiModel = new PegawaiModel();
        $data = [
            'title' => 'Data Pegawai',
            'pegawai' => $pegawaiModel->getAllPegawai() // Fetch all employees with their jabatan
        ];
        return view('pegawai/index', $data);
    }

    // Show the form for adding a new employee
    public function create()
    {
        $jabatanModel = new JabatanModel();
        $data = [
            'title' => 'Tambah Pegawai', // Pass the title here
            'jabatan' => $jabatanModel->findAll() // Fetch all jabatan
        ];
        return view('Admin/dataKaryawan/create', $data);
    }


    // Store a new employee
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
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'id_jabatan' => $this->request->getPost('id_jabatan'),
            'tanggal_masuk' => $this->request->getPost('tanggal_masuk'),
            'status' => $this->request->getPost('status'),
            'hak_akses' => $this->request->getPost('hak_akses'),
            'photo' => $photoName, // Save the generated photo name in the database
        ];

        $pegawaiModel->insert($data); // Save the new employee
        return redirect()->to('/pegawai')->with('message', 'Data pegawai berhasil disimpan!');
    }

    // Show the form for editing an existing employee
    public function edit($id)
    {
        $pegawaiModel = new PegawaiModel();
        $jabatanModel = new JabatanModel();
        $data = [
            'title' => 'Edit Pegawai',
            'pegawai' => $pegawaiModel->find($id), // Fetch employee by ID
            'jabatan' => $jabatanModel->findAll(), // Fetch all jabatan for the dropdown
        ];
        return view('pegawai/edit', $data);
    }

    // Update the employee's details
    public function update($id)
    {
        $pegawaiModel = new PegawaiModel();

        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nik' => 'required',
            'nama_pegawai' => 'required',
            'username' => 'required',
            'jenis_kelamin' => 'required',
            'id_jabatan' => 'required',
            'tanggal_masuk' => 'required',
            'status' => 'required',
            'hak_akses' => 'required',
            'photo' => 'if_exist|max_size[photo,2048]|is_image[photo]|mime_in[photo,image/png,image/jpg,image/jpeg]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
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
        ];

        // Handle file upload
        $photo = $this->request->getFile('photo');
        if ($photo && $photo->isValid() && !$photo->hasMoved()) {
            // Delete the old photo
            $oldPhoto = $pegawaiModel->find($id)['photo'];
            if ($oldPhoto && file_exists(FCPATH . 'uploads/' . $oldPhoto)) {
                unlink(FCPATH . 'uploads/' . $oldPhoto);
            }

            // Save the new photo
            $photoName = $photo->getRandomName();
            $photo->move(FCPATH . 'uploads/', $photoName);
            $data['photo'] = $photoName;
        }

        $pegawaiModel->update($id, $data); // Update employee data
        return redirect()->to('/pegawai')->with('message', 'Data pegawai berhasil diperbarui!');
    }


    // Delete an employee by ID
    public function delete($id)
    {
        $pegawaiModel = new PegawaiModel();
        $pegawai = $pegawaiModel->find($id);

        // Optionally delete the photo associated with the employee
        if ($pegawai['photo']) {
            unlink(WRITEPATH . 'uploads/' . $pegawai['photo']);
        }

        $pegawaiModel->delete($id); // Delete employee by ID
        return redirect()->to('/pegawai'); // Redirect back to the list of employees
    }
}
