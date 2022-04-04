<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Account::create(['name'=>'Cash Counter', 'type'=>'Cash', 'as_off_date'=>date('Y-m-d'), 'opening_balance'=>0, 'balance'=>0, 'created_by'=>1]);
        Account::create(['name'=>'AlRafay Bank Account', 'type'=>'Credit', 'as_off_date'=>date('Y-m-d'), 'opening_balance'=>0, 'balance'=>0, 'created_by'=>1]);
        //\App\Models\Account::factory(10)->create();
    }
}
