<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;

class AccountFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Account::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'account_title' => $this->faker->name(),
            'type' => $this->faker->randomElement(['Cash', 'Jazcash', 'Bank', 'Easypaisa']),
            'account_number' => $this->faker->numerify('###############'),
            'bank_name' => $this->faker->randomElement(['Active', 'Inactive']),
            'as_off_date' => $this->faker->date($format = 'Y-m-d', $max = '2010-01-01'),
            'opening_balance' =>$this->faker->numberBetween($min = -2000000, $max = 2000000),
            'balance' => $this->faker->numberBetween($min = -2000000, $max = 2000000),
            'created_by' => Admin::pluck('id')->random(),
        ];
    }
}
