<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Incomes;
use App\Balance;
use App\Categories;

class IncomesController extends Controller
{
    // Menampilkan Semua Data
    public function index()
    {
        $incomes = Incomes::getAll();
        $categories = Categories::getAll();
        return view('incomes.index', compact('incomes', 'categories'));
    }

    // Goto Add Data Page
    public function addPage()
    {
        $title = "Tambah Data Pemasukan";

        // Ambil semua data kategori
        $categories = Categories::getAll();

        return view('incomes.create', compact('title', 'categories'));
    }

    public function insert(Request $request)
    {

        // Use the insert method from the Incomes model
        $income = Incomes::insert([
            'amount' => $request->amount,
            'description' => $request->description,
            'date' => $request->date,
            'id_category' => $request->id_category,
            'created_at' => now(),
        ]);

        // Check if the insert operation was successful
        if ($income) {
            return redirect()->route('incomes')->with('success', 'Data Berhasil Ditambahkan');
        }

        // Handle error if the insert operation failed
        return redirect()->route('incomes')->with('error', 'Gagal menambahkan data. Silakan coba lagi.');
    }

    // Delete Data
    public function delete($id)
    {
        // Use the delete method from the Incomes model
        $income = Incomes::deleteData($id);

        // Check if the delete operation was successful
        if ($income) {
            return redirect()->route('incomes')->with('success', 'Data Berhasil Dihapus');
        }

        // Handle error if the delete operation failed
        return redirect()->route('incomes')->with('error', 'Gagal menghapus data. Silakan coba lagi.');
    }
}
