<?php

namespace App\Models;

use CodeIgniter\Model;

class DashboardModel extends Model
{
    protected $table = ''; // Tambahkan jika menggunakan database query builder

    public function countKaryawan()
    {
        // Contoh query: Hitung total karyawan dari tabel `karyawan`
        return $this->db->table('pegawai')->countAll();
    }

    public function countAdmin()
    {
        // Contoh query: Hitung total admin dari tabel `users` (role = admin)
        return $this->db->table('users')->where('role', 'admin')->countAllResults();
    }

    public function countJabatan()
    {
        // Contoh query: Hitung total jabatan dari tabel `jabatan`
        return $this->db->table('jabatan')->countAll();
    }

    public function countKehadiran()
    {
        // Contoh query: Hitung total kehadiran dari tabel `absensi`
        return $this->db->table('absensi')->countAll();
    }
}
