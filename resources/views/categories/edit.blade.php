@extends('layouts.app')

@section('content')
<div class="container-fluid px-5">
  <div class="row">

    <!-- Form Edit Kategori -->
    <div class="col-md-6">
      <div class="card shadow-sm p-3">
        <div class="card-body">
          <h5 class="card-title fw-bold">Edit Data Kategori</h5>
          <hr>
          <form action="{{ route('categories.update', $category->id_category) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="name_category">Nama Kategori</label>
              <input type="text" class="form-control @error('name_category') is-invalid @enderror" id="name_category" name="name_category" value="{{ $category->name_category }}">
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

    <!-- Rekomendasi Kategori -->
    <div class="col-md-6">
      <div class="card shadow-sm p-3">
        <div class="card-body">
          <h5 class="card-title fw-bold">Rekomendasi Kategori</h5>
          <hr>
          <form>
            <div class="form-group">
              <label>Pilih Kategori</label><br>
              <div class="btn-group" role="group">
                <input type="radio" id="makanan" name="recommended_category" value="Makanan" class="btn-check" autocomplete="off">
                <label class="btn btn-outline-primary" for="makanan">Makanan</label>

                <input type="radio" id="minuman" name="recommended_category" value="Minuman" class="btn-check" autocomplete="off">
                <label class="btn btn-outline-primary" for="minuman">Minuman</label>

                <input type="radio" id="snack" name="recommended_category" value="Snack" class="btn-check" autocomplete="off">
                <label class="btn btn-outline-primary" for="snack">Snack</label>

                <input type="radio" id="peralatan" name="recommended_category" value="Peralatan" class="btn-check" autocomplete="off">
                <label class="btn btn-outline-primary" for="peralatan">Peralatan</label>

                <input type="radio" id="perlengkapan" name="recommended_category" value="Perlengkapan" class="btn-check" autocomplete="off">
                <label class="btn btn-outline-primary" for="perlengkapan">Perlengkapan</label>

                <input type="radio" id="paket_data" name="recommended_category" value="Paket Data" class="btn-check" autocomplete="off">
                <label class="btn btn-outline-primary" for="paket_data">Paket Data</label>

                <input type="radio" id="lainnya" name="recommended_category" value="Lainnya" class="btn-check" autocomplete="off">
                <label class="btn btn-outline-primary" for="lainnya">Lainnya</label>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection