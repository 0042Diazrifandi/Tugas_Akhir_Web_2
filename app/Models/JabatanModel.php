<?php

namespace App\Models;

use CodeIgniter\Model;

class JabatanModel extends Model
{
    protected $table = 'data_jabatan';
    protected $primaryKey = 'id_jabatan';
    protected $allowedFields = ['nama_jabatan', 'gaji_pokok', 'tj_transpot', 'uang_makan', 'alpha', 'id_pegawai'];
}
