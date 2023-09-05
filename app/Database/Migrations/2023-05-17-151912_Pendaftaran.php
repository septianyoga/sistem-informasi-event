<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pendaftaran extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pendaftaran'          => [
                'type'           => 'INT',
                'auto_increment' => true
            ],
            'id_event'       => [
                'type'           => 'INT',
            ],
            'nama_lengkap'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '200'
            ],
            'jenis_kelamin' => [
                'type'           => 'ENUM',
                'constraint'     => ['Laki-laki', 'Perempuan'],
            ],
            'alamat'      => [
                'type'           => 'TEXT',
            ],
            'email'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '30'
            ],
            'wa'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '40'
            ],
            'tanggal_daftar'      => [
                'type'           => 'DATE',
            ],
        ]);

        // Membuat primary key
        $this->forge->addKey('id_pendaftaran', TRUE);

        // Membuat tabel news
        $this->forge->createTable('pendaftaran', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('pendaftaran');
    }
}
