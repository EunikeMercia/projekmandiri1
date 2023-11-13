@extends('admin.template')
@section('title', 'Tambah Rak')
@section('content')
<div class="page-content">
    <div class="main-wrapper">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Rak</h5>
                        <form action="{{ route('rak.store')}}" method="post">
                        @csrf
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Nama Rak</label>
                            <input type="text" name="nm_rak" class="form-control @error('nm_rak') is-invalid @enderror" id="formGroupExampleInput" placeholder="Nama Rak" required>
                            @error('nm_rak')
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