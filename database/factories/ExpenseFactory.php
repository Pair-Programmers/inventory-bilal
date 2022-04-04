<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\Admin;
use App\Models\Expense;
use App\Models\ExpenseCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExpenseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Expense::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'expense_date' => $this->faker->date($format = 'Y-m-d', $max = '2010-01-01'),
            'amount' => $this->faker->numberBetween($min = 10, $max = 2000000),
            'note' => $this->faker->paragraph(),
            'account_id' => Account::pluck('id')->random(),
            'expense_category_id' => ExpenseCategory::pluck('id')->random(),
            'created_by' => Admin::pluck('id')->random(),
        ];
    }
}
