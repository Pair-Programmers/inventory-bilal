<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Vendor;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Invoice::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'amount' => $this->faker->numberBetween($min = 10, $max = 5000000),
            'no_of_items' => $this->faker->numberBetween($min = 10, $max = 50),
            'no_of_products' => $this->faker->numberBetween($min = 10, $max = 50),
            'issue_date' => $this->faker->date($format = 'Y-m-d', $max = '2010-01-01'),
            'discount' => $this->faker->numberBetween($min = 10, $max = 200),
            'reference_no' => $this->faker->numerify('######'),
            'description' => $this->faker->paragraph(),
            'type' => $this->faker->randomElement(['Sale', 'Purchase', 'Sale Return', 'Purchase Return']),
            'group' => $this->faker->randomElement(['Cash', 'Credit']),
            'customer_id' => Customer::pluck('id')->random(),
            'vendor_id' => Vendor::pluck('id')->random(),
            'created_by' => Admin::pluck('id')->random(),
        ];
    }
}
