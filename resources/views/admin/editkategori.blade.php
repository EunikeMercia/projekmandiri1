@extends('admin.template')
@section('title', 'Edit Kategori')
@section('content')
<div class="page-content">
    <div class="main-wrapper">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Kategori</h5>
                        <form action="{{ route('kategori.update', $kategori->id)}}" method="post">
                        @csrf
                        @method('PUT')
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Nama Kategori</label>
                            <input type="text" name="nm_kategori" class="form-control" id="formGroupExampleInput" placeholder="Nama Kategori" required value="{{ old('nm_kategori', $kategori->nm_kategori) }}">
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