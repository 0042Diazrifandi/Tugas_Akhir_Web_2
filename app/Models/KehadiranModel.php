<?php

namespace App\Models;

use CodeIgniter\Model;

class KehadiranModel extends Model
{
    protected $table = 'data_kehadiran';
    protected $primaryKey = 'id_kehadiran';
    protected $allowedFields = ['bulan', 'hadir', 'sakit', 'alpha', 'id_pegawai'];
}
