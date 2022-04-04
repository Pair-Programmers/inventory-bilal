<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\ExpenseCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExpenseCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ExpenseCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(['Rent', 'Electricity', 'Cleaning', 'Employee Salary', 'Construction']),
            'created_by' => Admin::pluck('id')->random(),
        ];
    }
}
