<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

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
            'cnic' => $this->faker->numerify('#####-#######-#'),
            'profile_image'=>$this->faker->image('public/storage/images/employees',200,200, null, false),
            'salary' => $this->faker->numberBetween($min = 0, $max = 999999),
            'role' => $this->faker->randomElement(['Manager', 'Worker', 'Cleaner']),

            'created_by' => Admin::pluck('id')->random()
        ];
    }
}
