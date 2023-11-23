@extends('layouts.app')

@section('content')
<div class="container-fluid px-5">
  <div class="row">
    <div class="table-responsive shadow-sm p-3">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

        <a href="{{ route('categories.addPage') }}" class="btn btn-sm btn-primary mb-3">
          <i class="fas fa-plus"></i>
          Tambah Kategori
        </a>

        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif

        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nama Kategori</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($categories as $category)
          <tr>
            <td>{{ $category->id_category }}</td>
            <td>{{ $category->name_category }}</td>
            <td>
              <a href="{{ route('categories.editPage', $category->id_category) }}" class="btn btn-sm btn-warning">
                <i class="fas fa-edit"></i>
                Edit
              </a>
              <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteCategoryModal{{ $category->id_category }}">
                <i class="fas fa-trash"></i>
                Delete
              </button>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    @foreach($categories as $category)
    <div class="modal fade" id="deleteCategoryModal{{ $category->id_category }}" tabindex="-1" aria-labelledby="deleteCategoryModal{{ $category->id_category }}" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deleteCategoryModal{{ $category->id_category }}">Hapus Data Kategori</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Apakah Anda yakin ingin menghapus kategori {{ $category->name_category }}?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <a href="{{ route('categories.delete', $category->id_category) }}" class="btn btn-danger">Hapus</a>
          </div>
        </div>
      </div>
    </div>
    @endforeach;

  </div>

</div>
@endsection