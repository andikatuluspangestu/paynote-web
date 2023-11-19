<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Import the Incomes model
use App\Incomes;
use App\Expenses;
use App\Balance;
use App\Categories;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Ambil total pemasukan dari model
        $total_incomes = Incomes::totalIncomes();

        // Ambil total balance dari model
        $total_balance = Balance::totalBalance();

        // Ambil total kategori dari model
        $total_categories = Categories::totalCategories();

        // Ambil total pengeluaran dari model
        $total_expenses = Expenses::totalExpenses();

        // Ambil semua data pemasukan dan pengeluaran dari model balance
        $incomesAndExpenses = Balance::getAllIncomesAndExpenses();

        // Ambil semua data kategori dari model categories
        $categories = Categories::getAll();

        // Kirim data total pemasukan ke view
        return view('dashboard/index', compact('total_incomes', 'total_balance', 'total_categories', 'total_expenses', 'incomesAndExpenses', 'categories'));
    }
}
