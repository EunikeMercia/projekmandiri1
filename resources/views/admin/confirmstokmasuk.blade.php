@extends('admin.template')
@section('title', 'Konfirmasi Stok Masuk')
@section('content')
<div class="page-content">
    <div class="main-wrapper">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Konfirmasi Stok Masuk</h5>
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
                                    <div class="col-md-6">
                                        <br>
                                        <button class="btn btn-primary" type="submit">Filter</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <table id="zero-conf" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">Stok Masuk</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse($stokmasuk as $item)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{ $item->barang->nm_barang }}</td>
                                    <td>{{ $item->stok_masuk }}</td>
                                    <td>{{ $item->tanggal }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <div class="update d-flex align-items-center">
                                                <a href="{{ route('stokmasuk.konfirmasi', $item->id) }}">
                                                    <button class="btn btn-success" type="submit"><i class="fas fa-check"></i></button>
                                                </a>
                                            </div>
                                            <!-- <div class="delete">
                                                <form action="{{ route('stokmasuk.delete', $item->id) }}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')"> Delete</button>
                                                </form> -->
                                            </div>
                                        </div>
                                    </td>
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