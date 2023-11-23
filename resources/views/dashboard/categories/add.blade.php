@extends('layouts.app')

@section('content')
<div class="container-fluid px-5">
  <div class="row">
    <div class="col-md-12">
      <div class="card shadow-sm p-3">
        <div class="card-header">
          <h5 class="card-title fw-bold">{{ $title }}</h5>
        </div>
        <div class="card-body">
          <form action="{{ route('categories.insert') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="name_category">Nama Kategori</label>
              <input type="text" class="form-control @error('name_category') is-invalid @enderror" id="name_category" name="name_category">
              @error('name_category')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <button type="submit" class="btn btn-sm btn-success">Simpan</button>
            <a href="{{ route('categories') }}" class="btn btn-sm btn-secondary">Kembali</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection