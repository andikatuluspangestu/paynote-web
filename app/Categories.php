<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    // Inisalisasi Table
    protected $table = 'categories';

    // Get All Data
    public static function getAll()
    {
        return Categories::all();
    }

    // Get Data by ID
    public static function getById($id)
    {
        return Categories::where('id_category', $id)->first();
    }

    // Insert Data
    public static function insert($data)
    {
        return Categories::create($data);
    }

    // Update Data
    public static function updateData($id_category, $data)
    {
        return Categories::where('id_category', $id_category)->update($data);
    }

    // Delete Data
    public static function deleteData($id)
    {
        return Categories::where('id_category', $id)->delete();
    }
}
