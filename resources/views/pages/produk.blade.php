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
                                <h3 class="mb-0">Tabel Produk</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="/produk/create" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#add">Tambah</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th class="text-center">
                                        Nama Produk
                                    </th>
                                    <th class="text-center">
                                        Merk
                                    </th>
                                    <th class="text-center">
                                        Harga Beli/Rim
                                    </th>
                                    <th class="text-center">
                                        Harga Jual/Rim
                                    </th>
                                    <th class="text-center">
                                        Harga Jual/Ecer
                                    </th>
                                    <th class="text-center">
                                        Stok Rim
                                    </th>
                                    <th class="text-center">
                                        Stok Ecer
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach($produk as $item)
                                    <tr>
                                        <td class="text-center">
                                            {{$item['nama_produk']}}
                                        </td>
                                        <td class="text-center">
                                            {{$item['merk']}}
                                        </td>
                                        <td class="text-center">
                                            Rp {{$item['harga_beli_rim']}}
                                        </td>
                                        <td class="text-center">
                                            Rp {{$item['harga_jual_rim']}}
                                        </td>
                                        <td class="text-center">
                                            Rp {{$item['harga_jual_ecer']}}
                                        </td>
                                        <td class="text-center">
                                            {{$item['stok_rim']}}
                                        </td>
                                        <td class="text-center">
                                            {{$item['stok_ecer']}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="/produk/create" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="" class="form-label">Gambar</label><br>
                  <input name="gambar[]" multiple type="file" class="@error('gambar') is-invalid @enderror" id="images" aria-describedby="emailHelp"><br>
                  @error('gambar')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                  <br>
                  <div class="col-md-12">
                    <div class="mt-1 text-center">
                    <div class="images-preview-div"> </div>
                    </div>
                  </div>
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Nama Produk</label>
                  <input name="nama" type="text" class="form-control @error('nama') is-invalid @enderror">
                  @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Harga</label>
                  <input name="harga" type="number" class="form-control @error('harga') is-invalid @enderror">
                  @error('harga')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Stok</label>
                  <input name="stok" type="number" class="form-control @error('stok') is-invalid @enderror">
                  @error('stok')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Satuan</label>
                    <select name="satuan" class="form-select @error('satuan') is-invalid @enderror">
                        <option value="gram">Gram</option>
                        <option value="Kg">Kg</option>
                        <option value="Ons">Ons</option>
                        <option value="Pcs">Pcs</option>
                        <option value="Pack">Pack</option>
                    </select>
                    @error('satuan')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Jumlah per Satuan</label>
                  <input name="jumlah_per_satuan" type="number" class="form-control @error('jumlah_per_satuan') is-invalid @enderror">
                  @error('jumlah_per_satuan')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Keterangan</label>
                  <textarea name="keterangan" type="text" class="form-control @error('keterangan') is-invalid @enderror" rows="3"></textarea>
                  @error('keterangan')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-light" data-bs-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
              <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
              </form>
            </div>
          </div>
        </div>
    </div>
@endsection