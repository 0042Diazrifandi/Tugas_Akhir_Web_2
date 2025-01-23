<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DataKehadiran extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id_kehadiran' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'bulan' => [
                'type' => 'INT',
                'constraint' => 11
            ],
            'hadir' => [
                'type' => 'INT',
                'constraint' => 11
            ],
            'sakit' => [
                'type' => 'INT',
                'constraint' => 11
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
        $this->forge->addKey('id_kehadiran', true);
        $this->forge->addForeignKey('id_pegawai', 'pegawai', 'id_pegawai', 'CASCADE', 'CASCADE');
        $this->forge->createTable('data_kehadiran');
    }

    public function down()
    {
        //
    }
}
