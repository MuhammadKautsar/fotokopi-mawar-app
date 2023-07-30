<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\Penjualan;
use App\Models\Produk;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $jumlah_produk = Produk::all()->count();
        $jumlah_pembelian = Pembelian::all()->count();
        $jumlah_penjualan = Penjualan::all()->count();
        return view('pages.dashboard', compact('jumlah_produk', 'jumlah_pembelian', 'jumlah_penjualan'));
    }
}
