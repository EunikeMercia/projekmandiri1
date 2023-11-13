@extends('admin.template')
@section('title', 'Master Stok Keluar')
@section('content')
<div class="page-content">
    <div class="main-wrapper">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Master Stok Keluar</h5>
                        <div class="tambah-stokkeluar mb-3">
                            <a href="{{ route('stokkeluar.create')}}" class="btn btn-success">Tambah Stok Keluar</a>
                        </div>
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
                                    <th scope="col">Stok Keluar</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse($stokkeluar as $item)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{ $item->barang->nm_barang }}</td>
                                    <td>{{ $item->stok_keluar }}</td>
                                    <td>{{ $item->tanggal }}</td>
                                    @if($item->status=="Pending")
                                    <td><span class="badge bg-warning">Pending</span></td>
                                    @else
                                    <td><span class="badge bg-success">Accepted</span></td>
                                    @endif
                                    @if($item->status=="Pending")
                                    <td>
                                        <div class="d-flex gap-2">
                                            <div class="update d-flex align-items-center">
                                                <a href="{{ route('stokkeluar.edit', $item->id) }}">
                                                    <button class="btn btn-primary" type="submit"> Edit</button>
                                                </a>
                                            </div>
                                            <div class="delete">
                                                <form action="{{ route('stokkeluar.delete', $item->id) }}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')"> Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                    @endif
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