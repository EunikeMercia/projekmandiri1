@extends('admin.template')
@section('title', 'Master Satuan Barang')
@section('content')
<div class="page-content">
    <div class="main-wrapper">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Master Satuan Barang</h5>
                        <div class="tambah-satuan mb-3">
                            <a href="{{ route('satuan.create')}}" class="btn btn-success">Tambah Satuan Barang</a>
                        </div>
                        <table id="zero-conf" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Satuan Barang</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse($satuan as $item)
                                <tr>
                                    <th scope="row" style="width: 10%;">{{$loop->iteration}}</th>
                                    <td style="width: 50%;">{{ $item->nm_satuan }}</td>
                                    <td style="width: 40%;">
                                        <div class="d-flex gap-2">
                                            <div class="update d-flex align-items-center">
                                                <a href="{{ route('satuan.edit', $item->id) }}">
                                                    <button class="btn btn-primary" type="submit"> Edit</button>
                                                </a>
                                            </div>
                                            <div class="delete">
                                                <form action="{{ route('satuan.delete', $item->id) }}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')"> Delete</button>
                                                </form>
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