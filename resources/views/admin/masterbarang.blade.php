@extends('admin.template')
@section('title', 'Master Barang')
@section('content')
<div class="page-content">
    <div class="main-wrapper">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Master Barang</h5>
                        <div class="tambah-barang mb-3">
                            <a href="{{ route('barang.create')}}" class="btn btn-success">Tambah Barang</a>
                        </div>
                        <div class="mb-3">
                            <form action="" method="get">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="">Filter by Rak:</label>
                                        <select name="rak_id" class="form-select">
                                            <option value="" selected>Semua</option>
                                            @foreach ($raks as $rak)
                                                <option value="{{ $rak->id }}" {{ Request::get('rak_id') == $rak->id ? 'selected' : '' }}>{{ $rak->nm_rak }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Filter by Kategori:</label>
                                        <select name="kategori_id" class="form-select">
                                            <option value="" selected>Semua</option>
                                            @foreach ($kategoris as $kategori)
                                                <option value="{{ $kategori->id }}" {{ Request::get('kategori_id') == $kategori->id ? 'selected' : '' }}>{{ $kategori->nm_kategori }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Filter by Stok:</label>
                                        <select name="status" class="form-select">
                                            <option value="" selected>Semua</option>
                                            <option value="Kurang" {{ Request::get('status') == "Kurang" ? 'selected' : '' }}>Kurang</option>
                                            <option value="Baik" {{ Request::get('status') == "Baik" ? 'selected' : '' }}>Baik</option>
                                            <option value="Sangat Baik" {{ Request::get('status') == "Sangat Baik" ? 'selected' : '' }}>Sangat Baik</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
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
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Stok</th>
                                    <th scope="col">Rak</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Satuan</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse($barang as $item)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{ $item->nm_barang }}</td>
                                    <td><img src="{{asset('storage/gambar_barang/' . $item->image)}}" width="100px" alt="location-team"></td>
                                    <td>{{ $item->stok }}</td>
                                    <td>{{ $item->rak->nm_rak }}</td>
                                    <td>{{ $item->kategori->nm_kategori }}</td>
                                    <td>{{ $item->satuan->nm_satuan }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <div class="update d-flex align-items-center">
                                                <a href="{{ route('barang.edit', $item->id) }}">
                                                    <button class="btn btn-primary" type="submit"> Edit</button>
                                                </a>
                                            </div>
                                            <div class="delete">
                                                <form action="{{ route('barang.delete', $item->id) }}" method="post">
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