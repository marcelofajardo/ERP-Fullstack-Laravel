<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\order_product;

class order_productSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        order_product::factory(10)->order_product()->create();
    }
}
