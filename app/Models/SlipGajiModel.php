<?php
// model/SlipGajiModel.php

namespace App\Models;

use CodeIgniter\Model;

class SlipGajiModel extends Model {
    protected $table = 'pegawai';
    protected $primaryKey = 'id_pegawai';
    
    // Mengambil data pegawai berdasarkan id_pegawai
    public function getPegawaiById($id_pegawai) {
        return $this->db->table('pegawai')->where('id_pegawai', $id_pegawai)->get()->getRowArray();
    }

    // Mengambil data jabatan berdasarkan id_jabatan
    public function getJabatanById($id_jabatan) {
        return $this->db->table('data_jabatan')->where('id_jabatan', $id_jabatan)->get()->getRowArray();
    }

    // Mengambil data kehadiran berdasarkan id_pegawai dan bulan
    public function getKehadiran($id_pegawai, $bulan) {
        return $this->db->table('data_kehadiran')->where('id_pegawai', $id_pegawai)->where('bulan', $bulan)->get()->getRowArray();
    }

    // Mengambil potongan gaji
    public function getPotonganGaji() {
        return $this->db->table('potongan_gaji')->get()->getResultArray();
    }
}
