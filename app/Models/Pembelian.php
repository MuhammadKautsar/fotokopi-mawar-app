<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ItemPembelian;

class Pembelian extends Model
{
    use HasFactory;

    protected $table = 'pembelians';

    protected $fillable = [
        'nomor_nota',
        'nama_suplier',
        'tanggal',
        'total_nominal',
    ];

    public function items()
    {
        return $this->hasMany(ItemPembelian::class);
    }
}
