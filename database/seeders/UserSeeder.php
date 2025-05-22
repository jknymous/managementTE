<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run()
    {
        // User admin
        DB::table('users')->insert([
            'name' => 'JKNymous',
            'username' => 'adminjknymous',
            'email' => 'jknymous@gmail.com',
            'password' => Hash::make('jknymous0212jk'), // password contoh
            'role' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // User biasa contoh
        DB::table('users')->insert([
            [
                'name' => 'Agus',
                'username' => 'agus',
                'email' => 'agus@gmail.com',
                'password' => Hash::make('agus123'),
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Eric',
                'username' => 'erik',
                'email' => 'erik@gmail.com',
                'password' => Hash::make('erik123'),
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
