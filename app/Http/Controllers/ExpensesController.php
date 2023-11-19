<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expenses;
use App\Categories;

class ExpensesController extends Controller
{
    // Index
    public function index()
    {
        // Ambil semua data dari model
        $expenses = Expenses::getAll();
        $categories = Categories::getAll();

        // Kirim data ke view
        return view('expenses/index', compact('expenses', 'categories'));
    }

    // Page Add
    public function addPage()
    {
        // Ambil semua data dari model
        $categories = Categories::getAll();

        // Kirim data ke view
        return view('expenses/create', compact('categories'));
    }

    public function insert(Request $request)
    {

        // Insert data ke table
        $expense = Expenses::insert([
            'amount' => $request->amount,
            'description' => $request->description,
            'date' => $request->date,
            'id_category' => $request->id_category,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        // Cek jika berhasil
        if ($expense) {
            // Redirect ke halaman list
            return redirect('/expenses')->with(['success' => '<strong>' . $request->description . '</strong> Telah ditambahkan']);
        } else {
            // Redirect ke halaman list
            return redirect('/expenses')->with(['error' => 'Terjadi kesalahan']);
        }    
    }
}
