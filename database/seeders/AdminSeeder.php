<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create(['name' => 'Hamza Saqib', 'email' => 'mianhamza7262@gmail.com', 'role' => 'Super Admin',
        'phone' => '03239991999', 'profile_image' => 'admin_profile.jpg', 'password' => Hash::make('hamza7262')]);
        Admin::create(['name' => 'Mian Sohail', 'email' => 'sohailmian.china@yahoo.com', 'role' => 'Admin',
        'phone' => '03217770185', 'profile_image' => 'admin_profile.jpg', 'password' => Hash::make('sohail123')]);
        Admin::create(['name' => 'Arslan', 'email' => 'arslansajid199@yahoo.com', 'role' => 'Admin',
        'phone' => '03239991999', 'profile_image' => 'admin_profile.jpg', 'password' => Hash::make('arsl199')]);
        //\App\Models\Admin::factory(10)->create();
    }
}
