@extends('admin.template')
@section('title', 'Tambah Stok Keluar')
@section('content')
<div class="page-content">
    <div class="main-wrapper">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Stok Keluar</h5>
                        <form action="{{ route('stokkeluar.store')}}" method="post">
                        @csrf
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Nama Barang</label>
                                <select name="barang_id" class="form-select" required>
                                    <option value="" disabled selected>Pilih Barang</option>
                                    @foreach ($barangs as $barang)
                                        <option value="{{ $barang->id }}">{{ $barang->nm_barang }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="formGroupExampleInput" class="form-label">Stok Barang</label>
                                    <input type="number" name="stok_keluar" class="form-control @error('stok_keluar') is-invalid @enderror" id="formGroupExampleInput" placeholder="Stok" required min="1" value="{{ old('stok_keluar') }}">
                                    @error('stok_keluar')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror 
                                </div>
                                <div class="col">
                                    <label for="formGroupExampleInput" class="form-label">Tanggal Stok Keluar</label>
                                    <input type="date" name="tanggal" class="form-control" id="formGroupExampleInput" placeholder="Stok" required value="{{ old('tanggal') }}">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">keterangan</label>
                                <textarea class="form-control" name="keterangan"></textarea>  
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