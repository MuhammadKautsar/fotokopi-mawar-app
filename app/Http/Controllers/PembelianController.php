<?php

namespace App\Http\Controllers;

use App\Models\ItemPembelian;
use App\Models\Produk;
use App\Models\Pembelian;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembelian = Pembelian::all();
        return view('pages.pembelian', compact('pembelian'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produk = Produk::all();
        return view('pages.add-pembelian', compact('produk'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pembelian = new Pembelian([
            'nomor_nota' => $request->nomor_nota,
            'nama_suplier' => $request->nama_suplier,
            'tanggal' => date('Y-m-d'),
            'total_nominal' => 0,
        ]);

        $pembelian->save();
        $totalNominal = 0;

        if ($request->has('produk_id')) {
            $produkIds = (array) $request->produk_id;
            $jumlahRim = (array) $request->jumlah_rim;
        
            foreach ($produkIds as $key => $produkId) {
                $produk = Produk::find($produkId);
                $produk->stok_rim += $jumlahRim[$key];
                $produk->save();

                $nominal = $jumlahRim[$key] * $produk->harga_beli_rim;
                $totalNominal += $nominal;

                ItemPembelian::create([
                    'pembelian_id' => $pembelian->id,
                    'produk_id' => $produkId,
                    'jumlah_rim' => $jumlahRim[$key],
                ]);
            }
        }        

        $pembelian->total_nominal = $totalNominal;
        $pembelian->save();

        return redirect('/pembelian')->with('sukses','Data berhasil diinput');
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
