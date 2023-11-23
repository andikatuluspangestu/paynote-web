<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Akun Default
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'email_verified_at' => '2020-01-01 00:00:00',
            'password' => bcrypt('admin123'),
            'remember_token' => Str::random(10),
            'created_at' => '2020-01-01 00:00:00',
        ]);
    }
}
