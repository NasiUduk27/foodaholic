<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produk';

    protected $fillable = [
        'nama_produk',
        'harga',
        'rating',
        'stok',
        'detail_produk',
        'batas_ketahanan',
        'foto_produk',
    ];

    public function mitra(){
        return $this->belongsTo(Mitra::class);
    }

    public function keranjang(){
        return $this->hasMany(Keranjang::class);
    }
    
    public function transaksi(){
        return $this->belongsToMany(Transaksi::class, 'transaksi_produk', 'produk_id', 'transaksi_id')->withPivot('qty');
    }
}