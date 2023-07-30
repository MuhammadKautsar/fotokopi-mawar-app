<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = Produk::all();
        return view('pages.produk', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.add-produk');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'merk' => 'required',
            'harga_beli_rim' => 'required|numeric',
            'harga_jual_rim' => 'required|numeric',
            'harga_jual_ecer' => 'required|numeric',
            'stok_rim' => 'required|numeric',
            'stok_ecer' => 'numeric'
        ]);

        $produk = new Produk([
            'nama_produk' => $request->nama_produk,
            'merk' => $request->merk,
            'harga_beli_rim' => $request->harga_beli_rim,
            'harga_jual_rim' => $request->harga_jual_rim,
            'harga_jual_ecer' => $request->harga_jual_ecer,
            'stok_rim' => $request->stok_rim,
            'stok_ecer' => $request->stok_ecer,
        ]);

        $produk->save();

        return redirect('/produk')->with('sukses','Data berhasil diinput');
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
