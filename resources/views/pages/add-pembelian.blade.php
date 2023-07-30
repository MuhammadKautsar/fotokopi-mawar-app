@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'pembelian'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Tambah Pembelian</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="/pembelian/store" method="POST" enctype="multipart/form-data">
                            @csrf
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nomor Nota</label>
                            <input name="nomor_nota" type="number" class="form-control @error('nama') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Suplier</label>
                            <input name="nama_suplier" type="text" class="form-control" id="exampleInputEmail1" >
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Produk</label>
                            <div class="produk-input-container">
                                <div class="produk-input-row">
                                    <select name="produk_id[]" class="form-control @error('produk_id') is-invalid @enderror">
                                        <option value="">- Pilih -</option>
                                        @foreach ($produk as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_produk }} {{ $item->merk }} harga {{ $item->harga_beli_rim }}</option>
                                        @endforeach
                                    </select>
                                    <div class="mb-3">
                                      <label for="exampleInputEmail1" class="form-label">Jumlah Rim</label>
                                      <input name="jumlah_rim[]" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="0">
                                    </div>
                                    <button type="button" class="btn btn-sm btn-success tambah-produk">Tambah</button>
                                </div>
                            </div>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        $('.tambah-produk').click(function() {
            var produkRow = `
                <div class="produk-input-row">
                    <select name="produk_id[]" class="form-control @error('produk_id') is-invalid @enderror">
                        <option value="">- Pilih -</option>
                        @foreach ($produk as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_produk }} harga beli {{ $item->harga_beli_rim }}</option>
                        @endforeach
                    </select>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Jumlah Rim</label>
                      <input name="jumlah_rim[]" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="0">
                    </div>
                    <button type="button" class="btn btn-sm btn-danger hapus-produk">Hapus</button>
                </div>
            `;
            $('.produk-input-container').append(produkRow);
        });

        $('.produk-input-container').on('click', '.hapus-produk', function() {
            $(this).parent().remove();
        });
    });
    </script>

@endsection