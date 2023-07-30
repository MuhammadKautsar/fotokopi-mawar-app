<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    
    protected $table = 'produks';

    protected $fillable = [
        'nama_produk',
        'merk',
        'harga_beli_rim',
        'harga_jual_rim',
        'harga_jual_ecer',
        'stok_rim',
        'stok_ecer',
    ];

}
