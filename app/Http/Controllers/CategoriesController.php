<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class CategoriesController extends Controller
{
    // Show All Data
    public function index()
    {
        $categories = Categories::getAll();
        return view('dashboard.categories.list', compact('categories'));
    }

    // Goto Add Data Page
    public function addPage()
    {
        $title = "Tambah Kategori";
        return view('dashboard.categories.add', compact('title'));
    }

    // Insert & Send Data to Model
    public function insert(Request $request)
    {
        $data = [
            'name_category' => $request->name_category
        ];

        Categories::insert($data);
        return redirect()->route('categories')->with('success', 'Data berhasil ditambahkan!');
    }

    // Go to Edit Data Page
    public function editPage($id)
    {
        $title = "Edit Kategori";
        $category = Categories::getById($id);
        return view('dashboard.categories.edit', compact('title', 'category'));
    }

    // Update Data via Model
    public function update(Request $request, $id_category)
    {
        $data = [
            'name_category' => $request->name_category
        ];

        Categories::updateData($id_category, $data);
        return redirect()->route('categories')->with('success', 'Data berhasil diubah!');
    }

    // Delete Data
    public function delete($id)
    {
        Categories::deleteData($id);
        return redirect()->route('categories')->with('success', 'Data berhasil dihapus!');
    }
}