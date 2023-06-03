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
            'id_produk' => '2',
            'id_mitra' => '2',
            'id_user' => '1',
            'status' => '1',
            'status' => '3',
            'nominal' => '96000',
        ]);
    }
}