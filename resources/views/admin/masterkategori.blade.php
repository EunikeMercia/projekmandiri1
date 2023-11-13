@extends('admin.template')
@section('title', 'Master Kategori')
@section('content')
<div class="page-content">
    <div class="main-wrapper">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Master Kategori</h5>
                        <div class="tambah-kategori mb-3">
                            <a href="{{ route('kategori.create')}}" class="btn btn-success">Tambah Kategori</a>
                        </div>
                        <table id="zero-conf" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Kategori</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse($kategori as $item)
                                <tr>
                                    <th scope="row" style="width: 10%;">{{$loop->iteration}}</th>
                                    <td style="width: 50%;">{{ $item->nm_kategori }}</td>
                                    <td style="width: 40%;">
                                        <div class="d-flex gap-2">
                                            <div class="update d-flex align-items-center">
                                                <a href="{{ route('kategori.edit', $item->id) }}">
                                                    <button class="btn btn-primary" type="submit"> Edit</button>
                                                </a>
                                            </div>
                                            <div class="delete">
                                                <form action="{{ route('kategori.delete', $item->id) }}" method="post">
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