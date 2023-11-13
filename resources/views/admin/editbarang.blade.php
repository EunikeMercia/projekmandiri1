@extends('admin.template')
@section('title', 'Edit Barang')
@section('content')
<div class="page-content">
    <div class="main-wrapper">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Barang</h5>
                        <form action="{{ route('barang.update', $barang->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Nama Barang</label>
                                <input type="text" name="nm_barang" class="form-control" id="formGroupExampleInput" placeholder="Nama Barang" required value="{{ old('nm_barang', $barang->nm_barang) }}">
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="formGroupExampleInput" class="form-label">Stok Barang</label>
                                    <input type="number" name="stok" class="form-control" id="formGroupExampleInput" placeholder="Stok" required value="{{ old('stok', $barang->stok) }}">
                                </div>
                                <div class="col">
                                    <label for="formGroupExampleInput" class="form-label">Rak</label>
                                    <select name="rak_id" class="form-select">
                                        <option value="" disabled selected>Open this select menu</option>
                                        @foreach ($raks as $rak)
                                            <option value="{{ $rak->id }}" {{ $barang->rak_id == $rak->id ? 'selected' : '' }}>{{ $rak->nm_rak }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="formGroupExampleInput" class="form-label">Ketegori Barang</label>
                                    <select name="kategori_id" class="form-select">
                                        <option value="" disabled selected>Open this select menu</option>
                                        @foreach ($kategoris as $kategori)
                                            <option value="{{ $kategori->id }}" {{ $barang->kategori_id == $kategori->id ? 'selected' : '' }}>{{ $kategori->nm_kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="formGroupExampleInput" class="form-label">Satuan Barang</label>
                                    <select name="satuan_barang_id" class="form-select">
                                        <option value="" disabled selected>Open this select menu</option>
                                        @foreach ($satuans as $satuan)
                                            <option value="{{ $satuan->id }}" {{ $barang->satuan_barang_id == $satuan->id ? 'selected' : '' }}>{{ $satuan->nm_satuan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Default file input example</label>
                                <input class="form-control" type="file" id="formFile" name="image">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>                  
    </div>
</div>
@endsection