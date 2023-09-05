<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Event extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_event'          => [
                'type'           => 'INT',
                'auto_increment' => true
            ],
            'nama_event'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'tanggal_event'      => [
                'type'           => 'DATE',
            ],
            'deskripsi' => [
                'type'           => 'TEXT',
            ],
            'gambar'      => [
                'type'           => 'TEXT',
            ],
        ]);

        // Membuat primary key
        $this->forge->addKey('id_event', TRUE);

        // Membuat tabel news
        $this->forge->createTable('event', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('event');
    }
}
