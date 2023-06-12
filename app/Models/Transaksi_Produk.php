<?php

namespace App\Models;

use App\Traits\HasCompositePrimaryKeyTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi_Produk extends Model
{
    use HasFactory;
    use HasCompositePrimaryKeyTrait;
    protected $table='transaksi_produk';
    protected $primaryKey = ['transaksi_id', 'produk_id'];
    public $incrementing = false;
}