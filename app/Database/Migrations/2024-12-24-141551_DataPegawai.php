<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class dataPegawai extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id_pegawai' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'nik' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'nama_pegawai' => [
                'type' => 'VARCHAR',
                'constraint' => 250
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 120
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 120
            ],
            'jenis_kelamin' => [
                'type' => 'VARCHAR',
                'constraint' => 120
            ],
            'id_jabatan' => [
                'type' => 'INT',
                'constraint' => 11
            ],
            'tanggal_masuk' => [
                'type' => 'DATE'
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'photo' => [
                'type' => 'VARCHAR',
                'constraint' => 250
            ],
            'hak_akses' => [
                'type' => 'ENUM',
                'constraint' => ['karyawan','admin']
            ],
        ]); 
        $this->forge->addKey('id_pegawai', true);
        $this->forge->createTable('pegawai');
    }

    public function down()
    {
        //
    }
}
