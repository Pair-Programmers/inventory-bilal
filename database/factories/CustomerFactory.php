<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'phone' => $this->faker->e164PhoneNumber(),
            'address' => $this->faker->address,
            'email' => $this->faker->unique()->safeEmail(),
            'profile_image'=>$this->faker->image('public/storage/images/customers',200,200, null, false),
            'type' => $this->faker->randomElement(['Cash', 'Credit']),
            'status' => $this->faker->randomElement(['Active', 'Inactive']),
            'balance' => $this->faker->numberBetween($min = 0, $max = 999999),
            'opening_balance' => $this->faker->numberBetween($min = 0, $max = 999999),

            'created_by' => Admin::pluck('id')->random()

        ];
    }
}
