@extends('layouts.app')

@section('content')
<div class="container-fluid px-5">
  <div class="row">

    <!-- Form Tambah Data Pengeluaran -->
    <div class="col-md-12">
      <div class="card shadow-sm p-3">
        <div class="card-body">
          <h5 class="card-title fw-bold">
            Tambah Data Pengeluaran
          </h5>
          <hr>

          <!-- Form -->
          <form action="{{ route('expenses.insert') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="id_category">Kategori</label>
              <select class="form-control @error('id_category') is-invalid @enderror" id="id_category" name="id_category">
                <option value="">Pilih Kategori</option>
                @foreach($categories as $category)
                <option value="{{ $category->id_category }}">{{ $category->name_category }}</option>
                @endforeach
              </select>
              @error('id_category')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <!-- Date -->
            <div class="form-group">
              <label for="date">Tanggal</label>
              <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date') }}">
              @error('date')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <!-- Amount -->
            <div class="form-group">
              <label for="amount">Jumlah</label>
              <input type="text" class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount" value="{{ old('amount') }}">
              @error('amount')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <!-- Descriptions -->
            <div class="form-group">
              <label for="description">Deskripsi</label>
              <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description') }}</textarea>
              @error('description')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <!-- Buttons Action -->
            <button type="submit" class="btn btn-sm btn-success">Simpan</button>
            <a href="{{ route('incomes') }}" class="btn btn-sm btn-secondary">Kembali</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection