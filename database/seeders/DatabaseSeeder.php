<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\User::truncate();
        \App\Models\User::create(['name'=>'الإدارة','email'=>'admin@mara.gov.om','password'=>Hash::make('admin@mara.gov.om')]);
    }
}
