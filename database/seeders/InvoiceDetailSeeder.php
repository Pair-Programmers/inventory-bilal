<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class InvoiceDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\InvoiceDetail::factory(10)->create();
    }
}
