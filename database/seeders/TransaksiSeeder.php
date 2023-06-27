<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaksi')->insert([
            'id_mitra' => '2',
            'id_user' => '1',
            'status' => '1',
            'total' => '96000',
            'bayar_type' => 'Q',
        ]);
    }
}