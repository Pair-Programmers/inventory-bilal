<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Vendor;
use Illuminate\Database\Eloquent\Factories\Factory;

class VendorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vendor::class;

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
            'profile_image'=>$this->faker->image('public/storage/images/vendors',200,200, null, false),
            'type' => $this->faker->randomElement(['Cash', 'Credit']),
            'status' => $this->faker->randomElement(['Active', 'Inactive']),
            'balance' => $this->faker->numberBetween($min = 0, $max = 999999),
            'opening_balance' => $this->faker->numberBetween($min = 0, $max = 999999),

            'created_by' => Admin::pluck('id')->random()
        ];
    }
}
