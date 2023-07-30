<?php

namespace App\Models;

use App\Models\ItemPenjualan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = 'penjualans';

    protected $fillable = [
        'tanggal',
        'total_nominal',
    ];

    public function items()
    {
        return $this->hasMany(ItemPenjualan::class);
    }
}
