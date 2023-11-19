<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;

class CategoriesController extends Controller
{
    // Show All Data
    public function index()
    {
        $categories = Categories::getAll();
        return view('categories.index', compact('categories'));
    }

    // Goto Add Data Page
    public function addPage()
    {
        $title = "Tambah Data Kategori";
        return view('categories.create', compact('title'));
    }

    // Insert & Send Data to Model
    public function insert(Request $request)
    {
        $request->validate([
            'name_category' => 'required|unique:categories|max:255',
        ]);

        Categories::insert(['name_category' => $request->name_category ]);

        return redirect()->route('categories')->with('success', 'Data Berhasil Ditambahkan');
    }

    // Goto Edit Data Page
    public function editPage($id_category)
    {
        // Ambil data kategori berdasarkan id_category via model
        $category = Categories::getById($id_category);

        if (!$category) {
            return redirect()->route('categories')->with('error', 'Data Kategori Tidak Ditemukan');
        }

        $title = "Edit Data Kategori";
        return view('categories.edit', compact('title', 'category'));
    }

    // Update Data via Model
    public function update(Request $request, $id_category)
    {
        $request->validate([
            'name_category' => 'required|unique:categories|max:255',
        ]);

        Categories::updateData($id_category, [
            'name_category' => $request->name_category,
        ]);

        return redirect()->route('categories')->with('success', 'Data Berhasil Diubah');
    }

    // Delete Data
    public function delete($id)
    {
        Categories::deleteData($id);
        return redirect()->route('categories')->with('success', 'Data Berhasil Dihapus');
    }
}
