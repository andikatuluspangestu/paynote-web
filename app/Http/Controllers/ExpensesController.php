<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expenses;
use App\Models\Categories;

class ExpensesController extends Controller
{
    // Halaman List Pengeluaran
    public function index()
    {
        $expenses = Expenses::getAll();
        $categories = Categories::getAll();
        return view('dashboard.expenses.list', compact('expenses', 'categories'));
    }

    // Halaman Tambah Pengeluaran
    public function addPage()
    {
        $categories = Categories::getAll();
        return view('dashboard.expenses.add', compact('categories'));
    }

    // Tambah Pengeluaran
    public function insert(Request $request)
    {
        // Insert data ke table
        $expense = Expenses::insert([
            'amount'        => $request->amount,
            'description'   => $request->description,
            'date'          => $request->date,
            'id_category'   => $request->id_category,
            'created_at'    => date('Y-m-d H:i:s')
        ]);

        // Cek jika berhasil
        if ($expense) {
            return redirect('/expenses')->with(['success' => $request->description . 'Telah ditambahkan']);
        } else {
            return redirect('/expenses')->with(['error' => 'Terjadi kesalahan']);
        }    
    }
}
