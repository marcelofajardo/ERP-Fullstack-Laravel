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
      Product::factory(10)->create();
        // \App\Models\User::factory(10)->create();
          $this->call(UserSeeder::class);
          $this->call(ClientSeeder::class);
          $this->call(EmployeeSeeder::class);
          $this->call(ProductSeeder::class);
          $this->call(orderSeeder::class);
          $this->call(order_productSeeder::class);
         
          
      
        
    }
}
