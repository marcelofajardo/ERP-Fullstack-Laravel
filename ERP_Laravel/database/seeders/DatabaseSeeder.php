<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

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
          $this->call(UserSeeder::class);
          $this->call(ClientSeeder::class);
          $this->call(EmployeeSeeder::class);
        
        
        Product::factory(10)->create();
        
    }
}
