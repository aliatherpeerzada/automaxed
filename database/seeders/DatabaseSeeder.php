<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::create([
            'companyname'=>'Company Name ABC <br/> License Manager',
            'username' => 'aliather421',
            'password' => bcrypt('aliather421'),
            'secret'=>'i am ali',
        ]);
    }
}
