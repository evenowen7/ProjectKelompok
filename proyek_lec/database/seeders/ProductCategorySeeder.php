<?php

namespace Database\Seeders;

use App\Models\Product_Category;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Product_Category::insert([
            'category_name'=>'OPPO',
        ]);

        Product_Category::insert([
            'category_name'=>'SAMSUNG',
        ]);

        Product_Category::insert([
            'category_name'=>'MI SERIES',
        ]);
    }
}
