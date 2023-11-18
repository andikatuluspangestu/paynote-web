<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'email_verified_at' => '2020-01-01 00:00:00',
            'password' => bcrypt('admin123'),
            'remember_token' => Str::random(10),
        ]);
    }
}
