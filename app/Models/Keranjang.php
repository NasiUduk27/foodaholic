<?php

namespace App\Models;

use App\Traits\HasCompositePrimaryKeyTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;
    use HasCompositePrimaryKeyTrait;
    protected $table = 'keranjang';
    protected $primaryKey = ['user_id', 'produk_id'];
    public $incrementing = false;


    protected $fillable = [
        'user_id',
        'produk_id',
        'qty',
    ];

    public function produk(){
        return $this->belongsTo(Produk::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}