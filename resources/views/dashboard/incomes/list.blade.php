@extends('layouts.app')

@section('content')
<div class="container-fluid px-5">
  <div class="row">
    <div class="table-responsive shadow-sm p-3">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

        <a href="{{ route('incomes.addPage') }}" class="btn btn-sm btn-primary mb-3">
          <i class="fas fa-plus"></i>
          Tambah Data Pemasukan
        </a>

        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @elseif(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('error') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif

        <thead>
          <tr>
            <th scope="col">Tanggal</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Kategori</th>
            <th scope="col">Deskripsi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($incomes as $income)
          <tr>
            <td>{{ $income->date }}</td>
            <td>Rp {{ number_format($income->amount, 0, ',', '.') }}</td>
            <td>
                @foreach($categories as $category)
                    @if($category->id_category == $income->id_category)
                        <span class="badge badge-pill badge-primary">{{ $category->name_category }}</span>
                    @endif
                @endforeach
            </td>
            <td>{{ $income->description }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    @foreach($incomes as $income)
    <div class="modal fade" id="deleteincomeModal{{ $income->id_income }}" tabindex="-1" aria-labelledby="deleteincomeModal{{ $income->id_income }}" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deleteincomeModal{{ $income->id_income }}">Hapus Data Kategori</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Apakah Anda yakin ingin menghapus kategori {{ $income->name_income }}?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <a href="{{ route('incomes.delete', $income->id_income) }}" class="btn btn-danger">Hapus</a>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection