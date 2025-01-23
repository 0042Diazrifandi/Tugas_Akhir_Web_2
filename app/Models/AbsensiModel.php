<?php

namespace App\Models;

use CodeIgniter\Model;

class AbsensiModel extends Model
{
    protected $table = 'absensi';
    protected $primaryKey = 'id_absensi';
    protected $allowedFields = ['nik', 'status_kehadiran', 'tanggal_kehadiran'];
    protected $useTimestamps = true; // Aktifkan timestamps (created_at, updated_at)
}