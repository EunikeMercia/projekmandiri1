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
                        <form action="{{ route('')}}" method="post"></form>
                        @csrf
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Nama Rak</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nama Rak">
                          </div>
                          <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Another label</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder">
                          </div>
                          <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                    </div>
                </div>
            </div>
        </div>                  
    </div>
</div>
@endsection