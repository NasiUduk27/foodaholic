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
        'status',
        'total',
        'bayar',
        'bayar_type',
    ];

    public function mitra(){
        return $this->belongsTo(Mitra::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function produk(){
        return $this->belongsToMany(Produk::class, 'transaksi_produk', 'transaksi_id', 'produk_id')->withPivot('qty');
    }
}