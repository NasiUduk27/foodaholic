<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    use HasFactory;
    protected $table = 'Mitra';

    protected $fillable = [
        'nama_mitra',
        'lokasi_bisnis',
        'detail_mitra',
        'status_verifikasi',
    ];
}
