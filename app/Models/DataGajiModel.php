<?php

namespace App\Models;

use CodeIgniter\Model;

class DataGajiModel extends Model
{
    protected $table = 'data_jabatan';
    protected $primaryKey = 'id_jabatan';
    protected $allowedFields = ['id_jabatan', 'nama_jabatan', 'gaji_pokok', 'tj_transport', 'uang_makan', 'alpha'];

    public function getGajiByPegawai($idPegawai)
    {
        return $this->db->table('pegawai')
            ->select('pegawai.nama_pegawai, data_jabatan.gaji_pokok, data_jabatan.tj_transpot, data_jabatan.uang_makan, data_jabatan.alpha')
            ->join('data_jabatan', 'pegawai.id_jabatan = data_jabatan.id_jabatan', 'left')
            ->where('pegawai.id_pegawai', $idPegawai)
            ->get()
            ->getRowArray();
    }
}
