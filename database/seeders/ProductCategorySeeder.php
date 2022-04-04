<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductCategory::create(['name'=>'Food', 'created_by'=>1]);
        ProductCategory::create(['name'=>'Bread', 'created_by'=>1]);
        ProductCategory::create(['name'=>'Hot Drinks', 'created_by'=>1]);
        ProductCategory::create(['name'=>'Cold Drinks', 'created_by'=>1]);
        //\App\Models\ProductCategory::factory(10)->create();
    }
}
