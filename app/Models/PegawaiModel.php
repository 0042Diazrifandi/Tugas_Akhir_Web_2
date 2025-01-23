<?php

namespace App\Models;

use CodeIgniter\Model;

class PegawaiModel extends Model
{
    protected $table = 'pegawai';
    protected $primaryKey = 'id_pegawai';
    protected $allowedFields = ['nik', 'nama_pegawai', 'username', 'password', 'jenis_kelamin', 'id_jabatan', 'tanggal_masuk', 'status', 'photo', 'hak_akses'];

    protected $useTimestamps = false; 
    /**
     * Get user by username.
     *
     * @param string $username
     * @return array|null
     */
    public function getUserByUsername($username)
    {
        return $this->where('username', $username)->first();
    }

    /**
     * Count total employees.
     *
     * @return int
     */
    public function countKaryawan()
    {
        return $this->where('hak_akses', 'karyawan')->countAllResults();
    }

    /**
     * Count total admins.
     *
     * @return int
     */
    public function countAdmin()
    {
        return $this->where('hak_akses', 'admin')->countAllResults();
    }

    /**
     * Count total job roles.
     *
     * @return int
     */
    public function countJabatan()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('data_jabatan');
        return $builder->countAllResults();
    }

    /**
     * Count total attendance records.
     *
     * @return int
     */
    public function countKehadiran()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('data_kehadiran');
        return $builder->countAllResults();
    }

    /**
     * Get all employees with their job roles.
     *
     * @return array
     */
    public function getAllPegawai()
    {
        return $this->select('pegawai.*, data_jabatan.nama_jabatan')
            ->join('data_jabatan', 'pegawai.id_jabatan = data_jabatan.id_jabatan', 'left')
            ->findAll();
    }


    public function getPegawaiById($idPegawai)
    {
        return $this->select('pegawai.*, data_jabatan.nama_jabatan')
            ->join('data_jabatan', 'pegawai.id_jabatan = data_jabatan.id_jabatan', 'left')
            ->where('pegawai.id_pegawai', $idPegawai)
            ->first();
    }
}
