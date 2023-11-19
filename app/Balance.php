<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    // Table Initaialization
    protected $table = 'balance';
    public $timestamps = false;

    // Income & Expense Table
    protected $incomesTable = 'incomes';
    protected $expensesTable = 'expenses'; 

    // Fill Table
    protected $fillable = [
        'amount', 'description', 'updated_at'
    ];

    // Get All Data
    public static function getAll()
    {
        return Balance::all();
    }

    // Get Data by ID
    public static function getById($id)
    {
        return Balance::where('id_balance', $id)->first();
    }

    // Total Balance
    public static function totalBalance()
    {
        $totalBalance = Balance::sum('amount');
        return $totalBalance;
    }

    // Mengambil semua data pemasukan dan pengeluaran (Join Table Incomes dan Expenses)
    public static function getAllIncomesAndExpenses()
    {
        // Ambil semua data pemasukan dari Tabel Incomes
        $incomes = Incomes::all();

        // Ambil semua data pengeluaran dari Tabel Expenses
        $expenses = Expenses::all();

        // Gabungkan data pemasukan dan pengeluaran dengan Join Table
        $incomesAndExpenses = $incomes->concat($expenses);

        // Urutkan data pemasukan dan pengeluaran berdasarkan tanggal
        $incomesAndExpenses = $incomesAndExpenses->sortByDesc('date');

        // Return data pemasukan dan pengeluaran
        return $incomesAndExpenses;
    }

}
