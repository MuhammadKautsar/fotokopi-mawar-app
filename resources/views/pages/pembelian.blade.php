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
                                <h3 class="mb-0">Tabel Pembelian</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="/pembelian/create" class="btn btn-sm btn-primary">Tambah</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th class="text-center">
                                        Tanggal
                                    </th>
                                    <th class="text-center">
                                        Nomor Nota
                                    </th>
                                    <th class="text-center">
                                        Nama Suplier
                                    </th>
                                    <th class="text-center">
                                        Produk
                                    </th>
                                    <th class="text-center">
                                        Jumlah Rim
                                    </th>
                                    <th class="text-center">
                                        Total Nominal
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach($pembelian as $buy)
                                    <tr>
                                        <td class="text-center">
                                            {{$buy['tanggal']}}
                                        </td>
                                        <td class="text-center">
                                            {{$buy['nomor_nota']}}
                                        </td>
                                        <td class="text-center">
                                            {{$buy['nama_suplier']}}
                                        </td>
                                        <td class="text-center">
                                            @foreach ($buy->items as $beli)
                                                {{$beli->produk->nama_produk}} {{$beli->produk->merk}}
                                                <br>
                                            @endforeach
                                        </td>
                                        <td class="text-center">
                                            @foreach ($buy->items as $beli)
                                                {{$beli['jumlah_rim']}}
                                                <br>
                                            @endforeach
                                        </td>
                                        <td class="text-center">
                                            Rp {{$buy['total_nominal']}}
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
@endsection