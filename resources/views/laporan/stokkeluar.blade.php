@extends('admin.template')
@section('title', 'Laporan Stok Keluar')
@section('content')
<div class="page-content">
    <div class="main-wrapper">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Laporan Stok Keluar</h5>
                        <div class="mb-3">
                            <form action="" method="get">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="">Mulai tanggal:</label>
                                        <input type="date" name="mulai_tanggal" class="form-control" id="formGroupExampleInput" placeholder="Stok" required value="{{ Request::get('mulai_tanggal') }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Sampai tanggal:</label>
                                        <input type="date" name="sampai_tanggal" class="form-control" id="formGroupExampleInput" placeholder="Stok" required value="{{ Request::get('sampai_tanggal') }}">
                                    </div>
                                    <div class="col-md-1">
                                        <br>
                                        <button class="btn btn-primary" type="submit">Filter</button>
                                    </div>
                                    <div class="col-md-5">
                                        <br>
                                        <button class="btn btn-primary" formaction="{{route('stokkeluar.downloadpdf')}}">Print PDF</button>
                                        <!-- <a href="{{route('stokmasuk.downloadpdf')}}" target="_blank">
                                        </a> -->
                                    </div>
                                </div>
                            </form>
                        </div>
                        <table id="zero-conf" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">Stok Keluar</th>
                                    <th scope="col">Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse($stokkeluar as $item)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{ $item->barang->nm_barang }}</td>
                                    <td>{{ $item->stok_keluar }}</td>
                                    <td>{{ $item->tanggal }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <th scope="row" colspan="3">Data belum tersedia</th>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>
@endsection