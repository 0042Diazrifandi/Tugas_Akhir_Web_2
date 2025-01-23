<?php

namespace App\Models;

use CodeIgniter\Model;

class DataAbsensiModel extends Model
{
    protected $table = 'data_kehadiran';
    protected $primaryKey = 'id_kehadiran';
    protected $allowedFields = ['bulan', 'hadir', 'sakit', 'alpha', 'id_pegawai'];

    public function getAbsensiByPegawai($idPegawai)
    {
        return $this->where('id_pegawai', $idPegawai)->findAll();
    }
}
