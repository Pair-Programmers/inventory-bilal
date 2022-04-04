<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductSubCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductSubCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(['T-Shirts', 'Tea', 'Coffee', 'Biscuites', 'Sprite', 'Cables']),
            'product_category_id' => ProductCategory::pluck('id')->random(),
            'created_by' => Admin::pluck('id')->random(),
        ];
    }
}
