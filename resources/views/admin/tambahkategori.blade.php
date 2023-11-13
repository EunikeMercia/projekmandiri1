@extends('admin.template')
@section('title', 'Tambah Kategori')
@section('content')
<div class="page-content">
    <div class="main-wrapper">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Kategori</h5>
                        <form action="{{ route('kategori.store')}}" method="post">
                        @csrf
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Nama Kategori</label>
                            <input type="text" name="nm_kategori" class="form-control @error('nm_kategori') is-invalid @enderror" id="formGroupExampleInput" placeholder="Nama Kategori" required value="{{ old('nm_kategori') }}">
                            @error('nm_kategori')
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