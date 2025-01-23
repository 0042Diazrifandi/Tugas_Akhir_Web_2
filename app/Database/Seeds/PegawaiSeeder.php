<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    public function run()
    {
        // Data pegawai pertama
        $data1 = [
            'nik' => '1234567890',
            'nama_pegawai' => 'John Doe',
            'username' => 'johndoe',
            'password' => password_hash('password123', PASSWORD_DEFAULT), // ini yaz pw nya
            'jenis_kelamin' => 'Laki-laki',
            'id_jabatan' => 32, // Misal jabatan 1
            'tanggal_masuk' => '2023-01-01',
            'status' => 'Aktif',
            'photo' => 'johndoe.jpg',
            'hak_akses' => 'admin', // Hak akses admin
        ];

        // Data pegawai kedua
        $data2 = [
            'nik' => '0987654321',
            'nama_pegawai' => 'Jane Smith',
            'username' => 'janesmith',
            'password' => password_hash('password456', PASSWORD_DEFAULT), // Password di-hash
            'jenis_kelamin' => 'Perempuan',
            'id_jabatan' => 33, // Misal jabatan 2
            'tanggal_masuk' => '2024-01-01',
            'status' => 'Aktif',
            'photo' => 'janesmith.jpg',
            'hak_akses' => 'karyawan', // Hak akses karyawan
        ];

        // Insert data ke tabel pegawai
        $this->db->table('pegawai')->insertBatch([$data1, $data2]);
    }
}
