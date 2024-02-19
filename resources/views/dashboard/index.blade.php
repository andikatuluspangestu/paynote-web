@extends('layouts.app')

@section('content')
<div class="container-fluid">

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
  </div>

  <!-- Content Row -->
  <div class="row">
    <div class="col-12">
      <div class="alert border-left-secondary shadow alert-warning alert-dismissible fade shadow show" role="alert">
        <strong>Selamat Datang!</strong> Anda telah masuk sebagai <strong>{{ Auth::user()->name }}</strong>.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">
            &times;
          </span>
        </button>
      </div>
    </div>
  </div>

  <!-- Content Row -->
  <div class="row">
    <!-- Balance Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                Balance
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                {{ number_format($total_balance, 0, ',', '.') }}
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-money-bill-wave fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Income Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                Incomes
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                {{ number_format($total_incomes, 0, ',', '.') }}
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-arrow-down fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Expense Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                Expense
              </div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                    {{ number_format($total_expenses, 0, ',', '.') }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-arrow-up fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Category Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                Category
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                {{ $total_categories }}
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-tags fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Table ( Income, Expanse ) Content -->
  <div class="row">
    <div class="col-12 col-sm-12">
      <div class="table">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-secondary">Income & Expense</h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <!-- <th>No</th>
                    <th>Jenis</th> -->
                    <th>Amount</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Category</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($incomesAndExpenses as $index => $incomeAndExpense)
                  <tr>
                    <!-- <td>{{ $index + 1 }}</td>
                    <td>
                      @if($incomeAndExpense instanceof App\Incomes)
                      <span class="badge badge-success">Pemasukan</span>
                      @elseif($incomeAndExpense instanceof App\Expenses)
                      <span class="badge badge-danger">Pengeluaran</span>
                      @endif
                    </td> -->
                    <td>{{ number_format($incomeAndExpense->amount, 0, ',', '.') }}</td>
                    <td>{{ $incomeAndExpense->description }}</td>
                    <td>{{ $incomeAndExpense->date }}</td>
                    <td>
                      @foreach($categories as $category)
                      @if($category->id_category == $incomeAndExpense->id_category)
                      {{ $category->name_category }}
                      @endif
                      @endforeach
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection