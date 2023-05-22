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
            'nama_mitra' => 'Mitra 1',
            'lokasi_bisnis' => 'Jl. Raya Cikarang',
            'detail_mitra' => 'Mitra 1 adalah mitra pertama',
        ]);

        DB::table('mitra')->insert([
            'nama_mitra' => 'Mitra 2',
            'lokasi_bisnis' => 'Jl. Raya Bandung',
            'detail_mitra' => 'Mitra 2 adalah mitra kedua',
            'status_verifikasi' => '1',
        ]);
    }
}
