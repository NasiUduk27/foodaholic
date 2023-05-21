<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            'level' => '1',
            'email' => 'user@gmail.com',
            'username' => 'user',
            'name' => 'John Doe',
            'password' => Hash::make('12345678'),
            'alamat' => 'Jl. Raya Cikarang',
            'no_hp' => '081234567890',
        ]);

        DB::table('users')->insert([
            'level' => '2',
            'email' => 'mitra@gmail.com',
            'username' => 'mitra',
            'name' => 'Alfred Smith',
            'password' => Hash::make('12345678'),
            'alamat' => 'Jl. Raya Bandung',
            'no_hp' => '081239567101',
        ]);
    }
}