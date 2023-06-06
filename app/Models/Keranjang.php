<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;
    protected $table = 'keranjang';

    protected $fillable = [
        'user_id',
        'produk_id',
        'quantity',
    ];

    public function produk(){
        return $this->belongsTo(Produk::class);
    }

    public function mitra(){
        return $this->belongsTo(Mitra::class);
    }
}