// file: app/Database/Seeds/UserSeeder.php
<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'username' => 'admin',
            'password' => password_hash('password123', PASSWORD_DEFAULT),
            'role'     => 'admin',
        ];

        // Using Query Builder
        $this->db->table('users')->insert($data);
    }
}