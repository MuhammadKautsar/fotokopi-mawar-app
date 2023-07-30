<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemPenjualan extends Model
{
    use HasFactory;

    protected $table = 'item_penjualans';

    protected $fillable = [
        'penjualan_id',
        'produk_id',
        'jumlah_rim',
        'jumlah_ecer',
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
