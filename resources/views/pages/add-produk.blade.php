@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'produk'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Tambah Produk</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="/produk/store" method="POST" enctype="multipart/form-data">
                            @csrf
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Produk</label>
                            <input name="nama_produk" type="text" class="form-control @error('nama') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Merk</label>
                            <input name="merk" type="text" class="form-control" id="exampleInputEmail1" >
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Harga Beli/Rim</label>
                            <input name="harga_beli_rim" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Harga Jual/Rim</label>
                            <input name="harga_jual_rim" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Harga Jual/Ecer</label>
                            <input name="harga_jual_ecer" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Stok Rim</label>
                            <input name="stok_rim" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="0">
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Stok Ecer</label>
                            <input name="stok_ecer" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="0">
                          </div>
                      </div>
                      <div class="card-footer">
                        <button type="submit" class="btn btn-sm btn-primary float-right"><i class="fa fa-save"></i> Simpan</button>
                        <a href="/produk" type="button" class="btn btn-sm btn-light float-right mr-2"><i class="fa fa-times"></i> Batal</a>
                        </form>
                      </div>
                </div>
            </div>
        </div>
    </div>
@endsection