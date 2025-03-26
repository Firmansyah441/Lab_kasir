<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $data = [
            [
                'nama_user' => 'Nama admin',
                'role_id' => '1',
                'username' => 'admin',
                'password' => bcrypt('admin'),
                'email' => 'admin@gmail.com',
            ],
            [
                'nama_user' => 'Nama petugas',
                'role_id' => '2',
                'username' => 'petugas',
                'password' => bcrypt('123456'),
                'email' => 'petugas@gmail.com',
            ],
        ];
        foreach ($data as $value) {
            User::create([
                'nama_user' => $value['nama_user'],
                'role_id' => $value['role_id'],
                'username' => $value['username'],
                'password' => $value['password'],
                'email' => $value['email'],
            ]);

        }
    }
}
