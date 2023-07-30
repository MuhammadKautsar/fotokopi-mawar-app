<?php

namespace App\Models;

use App\Models\Produk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ItemPembelian extends Model
{
    use HasFactory;

    protected $table = 'item_pembelians';

    protected $fillable = [
        'pembelian_id',
        'produk_id',
        'jumlah_rim',
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
