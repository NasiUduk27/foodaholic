<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produk')->insert([
            'id_mitra' => '1',
            'nama_produk' => 'Nasi Kotak',
            'harga' => '7000',
            'rating' => '4.7',
            'stok' => '8',
            'detail_produk' => 'Nasi Kotak adalah nasi yang dikemas dalam kotak',
            'batas_ketahanan' => '21',
        ]);

        DB::table('produk')->insert([
            'id_mitra' => '2',
            'nama_produk' => 'Ayam Goreng',
            'harga' => '6000',
            'rating' => '4.8',
            'stok' => '2',
            'detail_produk' => 'Ayam Goreng adalah ayam yang digoreng',
            'batas_ketahanan' => '8',
        ]);
    }
}