<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::create(['name' => 'Cash Customer', 'type' => 'Cash', 'created_by' => 1]);
        Customer::create(['name' => 'Geuests', 'type' => 'Credit', 'created_by' => 1]);
        Customer::create(['name' => 'Our Employees', 'type' => 'Credit', 'created_by' => 1]);
        //\App\Models\Customer::factory(20)->create();
    }
}
