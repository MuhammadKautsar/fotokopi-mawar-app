@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'penjualan'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Tabel Penjualan</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="/penjualan/create" class="btn btn-sm btn-primary">Tambah</a>
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
                                        Produk
                                    </th>
                                    <th class="text-center">
                                        Jumlah Rim
                                    </th>
                                    <th class="text-center">
                                        Jumlah Ecer
                                    </th>
                                    <th class="text-center">
                                        Total Nominal
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach($penjualan as $sell)
                                    <tr>
                                        <td class="text-center">
                                            {{$sell['tanggal']}}
                                        </td>
                                        <td class="text-center">
                                            @foreach ($sell->items as $jual)
                                                {{$jual->produk->nama_produk}} {{$jual->produk->merk}}
                                                <br>
                                            @endforeach
                                        </td>
                                        <td class="text-center">
                                            @foreach ($sell->items as $jual)
                                                {{$jual['jumlah_rim']}}
                                                <br>
                                            @endforeach
                                        </td>
                                        <td class="text-center">
                                            @foreach ($sell->items as $jual)
                                                {{$jual['jumlah_ecer']}}
                                                <br>
                                            @endforeach
                                        </td>
                                        <td class="text-center">
                                            Rp {{$sell['total_nominal']}}
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