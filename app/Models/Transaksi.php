<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';

    protected $fillable = [
        'id_mitra',
        'id_user',
        'id_produk',
        'status',
        'nominal',
    ];

    public function mitra(){
        return $this->belongsTo(Mitra::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function produk(){
        return $this->belongsTo(Produk::class);
    }
}
