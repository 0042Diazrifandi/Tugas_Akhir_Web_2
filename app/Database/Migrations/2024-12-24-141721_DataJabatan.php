<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DataJabatan extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id_jabatan' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'nama_jabatan' => [
                'type' => 'VARCHAR',
                'constraint' => 150
            ],
            'gaji_pokok' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'tj_transpot' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'uang_makan' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'alpha' => [
                'type' => 'INT',
                'constraint' => 11
            ],
            'id_pegawai' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true
            ],
        ]);
        $this->forge->addKey('id_jabatan', true);
        $this->forge->addForeignKey('id_pegawai', 'pegawai', 'id_pegawai', 'CASCADE', 'CASCADE');
        $this->forge->createTable('data_jabatan');

    }

    public function down()
    {
        //
    }
}
