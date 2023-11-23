@extends('layouts.app')

@section('content')
<div class="container-fluid px-5">
  <div class="row">
    <div class="table-responsive shadow-sm p-3">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

        <a href="{{ route('expenses.addPage') }}" class="btn btn-sm btn-primary mb-3">
          <i class="fas fa-plus"></i>
          Tambah Pengeluaran
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
          @foreach($expenses as $expense)
          <tr>
            <td>{{ $expense->date }}</td>
            <td>{{ $expense->amount }}</td>
            <td>
              @foreach($categories as $category)
              @if($category->id_category == $expense->id_category)
              {{ $category->name_category }}
              @endif
              @endforeach
            </td>
            <td>{{ $expense->description }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    @foreach($expenses as $expense)
    <div class="modal fade" id="deleteexpenseModal{{ $expense->id_expense }}" tabindex="-1" aria-labelledby="deleteexpenseModal{{ $expense->id_expense }}" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deleteexpenseModal{{ $expense->id_expense }}">Hapus Data Kategori</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Apakah Anda yakin ingin menghapus kategori {{ $expense->name_expense }}?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <a href="{{ route('expenses.delete', $expense->id_expense) }}" class="btn btn-danger">Hapus</a>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection