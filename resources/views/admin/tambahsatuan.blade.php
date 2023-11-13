@extends('admin.template')
@section('title', 'Tambah Satuan Barang')
@section('content')
<div class="page-content">
    <div class="main-wrapper">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Satuan Barang</h5>
                        <form action="{{ route('satuan.store')}}" method="post">
                        @csrf
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Nama Satuan Barang</label>
                            <input type="text" name="nm_satuan" class="form-control @error('nm_satuan') is-invalid @enderror" id="formGroupExampleInput" placeholder="Nama Satuan Barang" required value="{{ old('nm_satuan') }}">
                            @error('nm_satuan')
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