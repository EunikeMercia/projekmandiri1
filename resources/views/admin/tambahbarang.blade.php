@extends('admin.template')
@section('title', 'Tambah Barang')
@section('content')
<style>
    .select2-container {
         width: 100% !important;
    }
</style>
<div class="page-content">
    <div class="main-wrapper">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Barang</h5>
                        <form action="{{ route('barang.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Nama Barang</label>
                                <input type="text" name="nm_barang" class="form-control  @error('nm_barang') is-invalid @enderror" id="formGroupExampleInput" placeholder="Nama Barang" required value="{{ old('nm_barang') }}">
                                @error('nm_barang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror   
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="formGroupExampleInput" class="form-label">Stok Barang</label>
                                    <input type="number" name="stok" class="form-control  @error('stok') is-invalid @enderror" id="formGroupExampleInput" placeholder="Stok" required min="0" value="{{ old('stok') }}">
                                    @error('stok')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror   
                                </div>
                                <div class="col">
                                    <label for="formGroupExampleInput" class="form-label">Rak</label>
                                    <select name="rak_id" class="form-select js-example-basic-single">
                                        <option value="" disabled selected>Open this select menu</option>
                                        @foreach ($raks as $rak)
                                            <option value="{{ $rak->id }}">{{ $rak->nm_rak }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="formGroupExampleInput" class="form-label">Ketegori Barang</label>
                                    <select name="kategori_id" class="form-select js-example-basic-single" style="width: 100%">
                                        <option value="" disabled selected>Open this select menu</option>
                                        @foreach ($kategoris as $kategori)
                                            <option value="{{ $kategori->id }}">{{ $kategori->nm_kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="formGroupExampleInput" class="form-label">Satuan Barang</label>
                                    <select name="satuan_barang_id" class="form-select js-example-basic-single">
                                        <option value="" disabled selected>Open this select menu</option>
                                        @foreach ($satuans as $satuan)
                                            <option value="{{ $satuan->id }}">{{ $satuan->nm_satuan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Default file input example</label>
                                <input class="form-control  @error('image') is-invalid @enderror" type="file" id="formFile" name="image">
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror   
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