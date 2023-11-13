@extends('admin.template')
@section('title', 'Dashboard')
@section('content')
<div class="page-content">
    <div class="main-wrapper">
        <div class="row">
                <div class="col-md-6">
                    <div class="card stat-widget">
                        <div class="card-body">
                            <h5 class="card-title">Jumlah Rak</h5>
                            <h2>{{ $rak }}</h2>
                            <p>Rak</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card stat-widget">
                        <div class="card-body">
                            <h5 class="card-title">Jumlah Barang</h5>
                            <h2>{{ $barang }}</h2>
                            <p>Barang</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card stat-widget">
                        <div class="card-body">
                            <h5 class="card-title">Jumlah Stok Masuk</h5>
                            <h2>{{ $stok_masuk }}</h2>
                            <p>Stok Masuk</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card stat-widget">
                        <div class="card-body">
                            <h5 class="card-title">Jumlah Stok Keluar</h5>
                            <h2>{{ $stok_keluar }}</h2>
                            <p>Stok Keluar</p>
                        </div>
                    </div>
                </div>

        </div>
    </div>

</div>
@endsection