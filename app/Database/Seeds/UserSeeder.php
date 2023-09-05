<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $user = [
            'nama_user' => 'Admin',
            'email' => 'adminadmin@gmail.com',
            'username' => 'admin',
            'password' => 'password',
            'role' => 'Admin',
            'status_verifikasi' => 'Sudah Verifikasi',
            'foto' => '1685015815_768051e1470f6b0fa1fb.png',
        ];

        $this->db->table('user')->insert($user);

        $user = [
            'nama_user' => 'User',
            'email' => 'user@gmail.com',
            'username' => 'user',
            'password' => 'password',
            'role' => 'User',
            'status_verifikasi' => 'Sudah Verifikasi',
            'foto' => '1685015804_9aff280c03b34881933a.png',
        ];

        $this->db->table('user')->insert($user);
    }
}
