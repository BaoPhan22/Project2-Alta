<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => '$2y$10$zzWW52nPZZZhNWemPawgD.4g01GlRN7dWSB1pEz/GeLYGQhC7kcRa',
            'username' => 'admin',
            'role_id' => 1,
        ]);
    }
}
