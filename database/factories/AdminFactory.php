<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class AdminFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Admin::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->e164PhoneNumber(),
            'role' => $this->faker->randomElement(['Editor', 'Admin', 'Moderator']),
            'status' => $this->faker->randomElement(['Active', 'Inactive']),
            'profile_image'=>$this->faker->image('public/storage/images/admins',200,200, null, false),
            'password' => Hash::make('hamza7262'), // password
        ];
    }
}
