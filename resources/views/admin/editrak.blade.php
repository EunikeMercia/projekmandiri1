@extends('admin.template')
@section('title', 'Edit Rak')
@section('content')
<div class="page-content">
    <div class="main-wrapper">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Rak</h5>
                        <form action="{{ route('rak.update', $rak->id)}}" method="post">
                        @csrf
                        @method('PUT')
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Nama Rak</label>
                            <input type="text" name="nm_rak" class="form-control" id="formGroupExampleInput" placeholder="Nama Rak" required value="{{ old('nm_rak', $rak->nm_rak) }}">
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