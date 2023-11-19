<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incomes extends Model
{
    // Table Initaialization
    protected $table = 'incomes';
    protected $secondaryTable = 'balance';
    public $timestamps = false;
    
    // Fill Table
    protected $fillable = [
        'amount', 'description', 'date', 'id_category', 'created_at'
    ];

    // Get All Data
    public static function getAll()
    {
        return Incomes::all();
    }

    // Get Data by ID
    public static function getById($id)
    {
        return Incomes::where('id_income', $id)->first();
    }

    // Insert Data
    public static function insert($data)
    {
        // Ambil amount dari $data untuk dijadikan variabel baru dan tambahkan ke tabel balance
        $amount = $data['amount'];

        // tambahkan description ke tabel balance
        $description = "Pemasukan";

        // tambahkan data ke tabel balance
        $balance = Balance::create([
            'amount' => $amount,
            'description' => $description,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        // Jika penambahan data ke tabel balance berhasil, lanjutkan untuk menambahkan data ke tabel Incomes
        if ($balance) {
            // Tambahkan data ke tabel Incomes
            $income = Incomes::create($data);

            // Return data
            return $income;
        }

        // Jika penambahan data ke tabel balance gagal, return false
        return false;
    }


    // Update Data
    public static function updateData($id_income, $data)
    {
        return Incomes::where('id_income', $id_income)->update($data);
    }

    // Delete Data
    public static function deleteData($id)
    {
        return Incomes::where('id_income', $id)->delete();
    }

    // Jumlah Pemasukan
    public static function totalIncomes()
    {
        $incomes = Incomes::getAll();
        $total_incomes = 0;
        foreach ($incomes as $income) {
            $total_incomes += $income->amount;
        }
        return $total_incomes;
    }

    // Jumlah Pemasukan Bulan Ini
    public static function totalIncomesThisMonth()
    {
        $incomes = Incomes::whereMonth('date', date('m'))->get();
        $total_incomes = 0;
        foreach ($incomes as $income) {
            $total_incomes += $income->amount;
        }
        return $total_incomes;
    }
}
