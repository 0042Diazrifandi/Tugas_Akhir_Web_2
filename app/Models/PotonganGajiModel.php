<?php

namespace App\Models;

use CodeIgniter\Model;

class PotonganGajiModel extends Model
{
    protected $table = 'potongan_gaji';
    protected $primaryKey = 'id_potongan';
    protected $allowedFields = ['potongan', 'jml_potongan'];
}
