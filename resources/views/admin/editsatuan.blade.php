@extends('admin.template')
@section('title', 'Edit Satuan Barang')
@section('content')
<div class="page-content">
    <div class="main-wrapper">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Satuan Barang</h5>
                        <form action="{{ route('satuan.update', $satuan->id)}}" method="post">
                        @csrf
                        @method('PUT')
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Nama Satuan Barang</label>
                            <input type="text" name="nm_satuan" class="form-control" id="formGroupExampleInput" placeholder="Nama Satuan Barang" required value="{{ old('nm_satuan', $satuan->nm_satuan) }}">
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