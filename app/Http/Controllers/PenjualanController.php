<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use App\Models\ItemPenjualan;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penjualan = Penjualan::all();
        return view('pages.penjualan', compact('penjualan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produk = Produk::all();
        return view('pages.add-penjualan', compact('produk'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $penjualan = new Penjualan([
            'tanggal' => date('Y-m-d'),
            'total_nominal' => 0,
        ]);

        $penjualan->save();
        $totalNominal = 0;

        if ($request->has('produk_id')) {
            $produkIds = (array) $request->produk_id;
            $jumlahRim = (array) $request->jumlah_rim;
            $jumlahEcer = (array) $request->jumlah_ecer;
        
            foreach ($produkIds as $key => $produkId) {
                $produk = Produk::find($produkId);

                if ($produk->stok_ecer == 0) {
                    $produk->stok_rim -= $jumlahRim[$key];
                    $produk->stok_rim -= 1;
                    $produk->stok_ecer = 500 - $jumlahEcer[$key];
                } else {
                    $produk->stok_rim -= $jumlahRim[$key];
                    $produk->stok_ecer -= $jumlahEcer[$key];
                }

                $produk->save();

                $nominal1 = $jumlahRim[$key] * $produk->harga_jual_rim;
                $nominal2 = $jumlahEcer[$key] * $produk->harga_jual_ecer;
                $totalNominal = $totalNominal + $nominal1 + $nominal2;

                ItemPenjualan::create([
                    'penjualan_id' => $penjualan->id,
                    'produk_id' => $produkId,
                    'jumlah_rim' => $jumlahRim[$key],
                    'jumlah_ecer' => $jumlahEcer[$key],
                ]);
            }
        }        

        $penjualan->total_nominal = $totalNominal;
        $penjualan->save();

        return redirect('/penjualan')->with('sukses','Data berhasil diinput');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
