<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user'          => [
                'type'           => 'INT',
                'auto_increment' => true
            ],
            'nama_user'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '30'
            ],
            'email'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'username'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '30'
            ],
            'password'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '30'
            ],
            'role'      => [
                'type'           => 'ENUM',
                'constraint'     => ['Admin', 'User'],
            ],
            'status_verifikasi'      => [
                'type'           => 'ENUM',
                'constraint'     => ['Belum Verifikasi', 'Sudah Verifikasi'],
            ],
            'foto'      => [
                'type'           => 'varchar',
                'constraint'     => '255'
            ],
        ]);

        // Membuat primary key
        $this->forge->addKey('id_user', TRUE);

        // Membuat tabel news
        $this->forge->createTable('user', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('profil_website');
    }
}
