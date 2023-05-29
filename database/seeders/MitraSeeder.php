<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MitraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mitra')->insert([
            'nama_mitra' => 'Rumah Makan AJ',
            'user_id' => '1',
            'lokasi_bisnis' => 'Jl. Bandung No. 12',
            'detail_mitra' => 'Mitra 1 adalah mitra pertama',
        ]);

        DB::table('mitra')->insert([
            'nama_mitra' => 'Josafat Store',
            'user_id' => '2',
            'lokasi_bisnis' => 'Kemantren 1 No. 59 RT 10 RW 03',
            'detail_mitra' => 'Mitra 2 adalah mitra kedua',
            'status_verifikasi' => '1',
        ]);
    }
}