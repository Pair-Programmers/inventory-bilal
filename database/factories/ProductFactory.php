<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'cost_price' => $this->faker->numberBetween($min = 10, $max = 5000),
            'sale_price' => $this->faker->numberBetween($min = 10, $max = 5000),
            'opening_qty' => $this->faker->numberBetween($min = 10, $max = 50),
            'available_qty' => $this->faker->numberBetween($min = 10, $max = 50),
            'unit' => $this->faker->randomElement(['per KG', 'ml', 'per piece']),
            //'images' => `"[".$this->faker->image('public/storage/images/admins',200,200, null, false)."\","."[\"".$this->faker->image('public/storage/images/admins',200,200, null, false)."\",",
            'images' => "\"[\"abc.png\",\"abc2.png\"]\"",
            'colors' => $this->faker->randomElement(['Red,Blue,White', 'White,Yellow', 'White,Orange', 'Purple', 'White,Orange,Green']),
            'description' => $this->faker->paragraph(),
            'brand' => $this->faker->randomElement(['Apple', 'Nestle', 'Polo']),
            'product_category_id' => ProductCategory::pluck('id')->random(),
            'product_subcategory_id' => ProductSubCategory::pluck('id')->random(),
            'created_by' => Admin::pluck('id')->random(),
        ];
    }
}
