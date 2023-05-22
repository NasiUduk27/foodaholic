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
            'email' => 'fito@gmail.com',
            'username' => 'fito',
            'name' => 'Dhorifitto Diansyah Putra',
            'password' => Hash::make('12345678'),
            'alamat' => 'Perumahan De Daun C2 No. 17',
            'no_hp' => '081331189623',
        ]);

        DB::table('users')->insert([
            'level' => '2',
            'email' => 'josafat@gmail.com',
            'username' => 'josafat',
            'name' => 'Josafat Pratama Susilo',
            'password' => Hash::make('12345678'),
            'alamat' => 'Kemantren 1 No. 59 RT 10 RW 03',
            'no_hp' => '0895368679264',
        ]);

        DB::table('users')->insert([
            'level' => '0',
            'email' => 'fino@gmail.com',
            'username' => 'fino',
            'name' => 'Alfino Febry Krissaputra',
            'password' => Hash::make('12345678'),
            'alamat' => 'Jl. Kembang Turi no. 9',
            'no_hp' => '082229138202',
        ]);
    }
}