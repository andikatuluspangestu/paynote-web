<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $categories = [
            'Food',
            'Transportation',
            'Clothing',
            'Housing',
            'Utilities',
            'Medical/Healthcare'
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name_category' => $category
            ]);
        }
    }
}
