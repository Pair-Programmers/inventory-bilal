<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\ProductCategory::factory(10)->create();
        //run category before this.
        Product::create(['name' => 'Haleem Half (Chicken)', 'cost_price' => 80, 'sale_price' => 90, 'product_category_id' => 1, 'created_by' => 1]);
        Product::create(['name' => 'Haleem Full (Chicken)', 'cost_price' => 130, 'sale_price' => 150, 'product_category_id' => 1, 'created_by' => 1]);
        Product::create(['name' => 'Haleem Half (Beef)', 'cost_price' => 100, 'sale_price' => 120, 'product_category_id' => 1, 'created_by' => 1]);
        Product::create(['name' => 'Haleem Full (Beef)', 'cost_price' => 180, 'sale_price' => 200, 'product_category_id' => 1, 'created_by' => 1]);
        Product::create(['name' => 'Chany Half', 'cost_price' => 60, 'sale_price' => 70, 'product_category_id' => 1, 'created_by' => 1]);
        Product::create(['name' => 'Chany Full', 'cost_price' => 80, 'sale_price' => 100, 'product_category_id' => 1, 'created_by' => 1]);
        Product::create(['name' => 'Chicken Korma Half', 'cost_price' => 80, 'sale_price' => 90, 'product_category_id' => 1, 'created_by' => 1]);
        Product::create(['name' => 'Chicken Korma Full', 'cost_price' => 130, 'sale_price' => 150, 'product_category_id' => 1, 'created_by' => 1]);
        Product::create(['name' => 'Dall Fry Half', 'cost_price' => 70, 'sale_price' => 80, 'product_category_id' => 1, 'created_by' => 1]);
        Product::create(['name' => 'Dall Fry Full', 'cost_price' => 130, 'sale_price' => 150, 'product_category_id' => 1, 'created_by' => 1]);
        Product::create(['name' => 'Dall Chawal Half', 'cost_price' => 70, 'sale_price' => 80, 'product_category_id' => 1, 'created_by' => 1]);
        Product::create(['name' => 'Dall Chawal Full', 'cost_price' => 130, 'sale_price' => 150, 'product_category_id' => 1, 'created_by' => 1]);
        Product::create(['name' => 'Haleem Chawal Half', 'cost_price' => 80, 'sale_price' => 90, 'product_category_id' => 1, 'created_by' => 1]);
        Product::create(['name' => 'Haleem Chawal Full', 'cost_price' => 130, 'sale_price' => 150, 'product_category_id' => 1, 'created_by' => 1]);
        Product::create(['name' => 'Chai/Tea Cup', 'cost_price' => 30, 'sale_price' => 40, 'product_category_id' => 3, 'created_by' => 1]);
        Product::create(['name' => 'Chai/Tea Cup Special', 'cost_price' => 40, 'sale_price' => 50, 'product_category_id' => 3, 'created_by' => 1]);
        Product::create(['name' => 'Coke Regular', 'cost_price' => 12, 'sale_price' => 15, 'product_category_id' => 4, 'created_by' => 1]);
        Product::create(['name' => 'Coke Half Liter', 'cost_price' => 40, 'sale_price' => 55, 'product_category_id' => 4, 'created_by' => 1]);
        Product::create(['name' => 'Coke 1 Liter', 'cost_price' => 60, 'sale_price' => 70, 'product_category_id' => 4, 'created_by' => 1]);
        Product::create(['name' => 'Coke 1.5 Liter', 'cost_price' => 100, 'sale_price' => 110, 'product_category_id' => 4, 'created_by' => 1]);
        Product::create(['name' => 'Coke Tin Can 250ml', 'cost_price' => 50, 'sale_price' => 60, 'product_category_id' => 4, 'created_by' => 1]);
        Product::create(['name' => 'Sprite Regular', 'cost_price' => 20, 'sale_price' => 30, 'product_category_id' => 4, 'created_by' => 1]);
        Product::create(['name' => 'Sprite Half Liter', 'cost_price' => 40, 'sale_price' => 55, 'product_category_id' => 4, 'created_by' => 1]);
        Product::create(['name' => 'Sprite 1 Liter', 'cost_price' => 50, 'sale_price' => 70, 'product_category_id' => 4, 'created_by' => 1]);
        Product::create(['name' => 'Sprite 1.5 Liter', 'cost_price' => 100, 'sale_price' => 110, 'product_category_id' => 4, 'created_by' => 1]);
        Product::create(['name' => 'Sprite Tin Can 250ml', 'cost_price' => 50, 'sale_price' => 60, 'product_category_id' => 4, 'created_by' => 1]);
        Product::create(['name' => 'Water Half Liter', 'cost_price' => 20, 'sale_price' => 30, 'product_category_id' => 4, 'created_by' => 1]);
        Product::create(['name' => 'Water 1.5 Liter', 'cost_price' => 50, 'sale_price' => 60, 'product_category_id' => 4, 'created_by' => 1]);
        Product::create(['name' => 'Naan Sada', 'cost_price' => 12, 'sale_price' => 15, 'product_category_id' => 2, 'created_by' => 1]);
        Product::create(['name' => 'Naan Kulcha', 'cost_price' => 12, 'sale_price' => 15, 'product_category_id' => 2, 'created_by' => 1]);
        Product::create(['name' => 'Naan Half Roghni', 'cost_price' => 15, 'sale_price' => 20, 'product_category_id' => 2, 'created_by' => 1]);
        Product::create(['name' => 'Naan Full Roghni', 'cost_price' => 20, 'sale_price' => 25, 'product_category_id' => 2, 'created_by' => 1]);
        Product::create(['name' => 'Naan Aloo Wala', 'cost_price' => 30, 'sale_price' => 35, 'product_category_id' => 2, 'created_by' => 1]);
        Product::create(['name' => 'Roti Sada', 'cost_price' => 8, 'sale_price' => 10, 'product_category_id' => 2, 'created_by' => 1]);
        Product::create(['name' => 'Khameeri Roti', 'cost_price' => 12, 'sale_price' => 15, 'product_category_id' => 2, 'created_by' => 1]);
        Product::create(['name' => 'Paratha Sada', 'cost_price' => 25, 'sale_price' => 30, 'product_category_id' => 2, 'created_by' => 1]);
        //\App\Models\Product::factory(10)->create();
    }
}
